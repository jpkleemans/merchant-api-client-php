<?php

namespace ChannelEngineApiClient\Client {
	
	use Exception;
	
	use ChannelEngineApiClient\Models\Address;
	use ChannelEngineApiClient\Models\Cancellation;
	use ChannelEngineApiClient\Models\CancellationLine;
	use ChannelEngineApiClient\Models\Message;
	use ChannelEngineApiClient\Models\MerchantOrder;
	use ChannelEngineApiClient\Models\Order;
	use ChannelEngineApiClient\Models\OrderLine;
	use ChannelEngineApiClient\Models\OrderMerchant;
	use ChannelEngineApiClient\Models\OrderMerchantExtraDataItem;
	use ChannelEngineApiClient\Models\ReturnObject;
	use ChannelEngineApiClient\Models\ReturnLine;
	use ChannelEngineApiClient\Models\Shipment;
	use ChannelEngineApiClient\Models\ShipmentLine;
	
	use ChannelEngineApiClient\Enums\CancellationLineStatus;
	use ChannelEngineApiClient\Enums\CancellationStatus;
	use ChannelEngineApiClient\Enums\Gender;
	use ChannelEngineApiClient\Enums\OrderStatus;
	use ChannelEngineApiClient\Enums\ReturnReason;
	use ChannelEngineApiClient\Enums\ReturnStatus;
	use ChannelEngineApiClient\Enums\ReturnAcceptStatus;
	use ChannelEngineApiClient\Enums\ShipmentLineStatus;
	use ChannelEngineApiClient\Enums\ShipmentStatus;
	
	use ChannelEngineApiClient\Helpers\JsonMapper;
	use ChannelEngineApiClient\Helpers\Collection;
	use ChannelEngineApiClient\Helpers\HttpMethod;

	class ApiClient {
		
		private $environment;
		private $tenant;
		private $certificate;

		private $apiUrl;
		private $apiKey;
		private $apiSecret;
		
		const FIDDLER_PROXY 			= '127.0.0.1:8888';
		const USE_FIDDLER 				= false;
		const FIDDLER_CERTIFICATE_PATH 	= 'fiddler.crt';
		
		const ENV_DEVELOPMENT			= 'dev';
		const ENV_ACCEPTATION			= 'acc';
		const ENV_PRODUCTION			= 'prod';

		const DEV_URL 					= 'http://%s.channelengine.local';
		const ACC_URL 					= 'http://%s.channelengine-acc.nl';
		const PROD_URL 					= 'https://%s.channelengine.net';

		const BASE_PATH 				= '/api/v1/';
		const CERTIFICATE_PATH			= 'AddTrustExternalCARoot.crt';

        const ORDERS_PATH 				= 'orders/';
        const SHIPMENTS_PATH 			= 'shipments/';
        const RETURNS_PATH 				= 'returns/';
		
		/**
		 * Create a new instance of the Kieskeurig Api client.
		 * @param string $apiKey Your personal Api key
		 * @param string $apiSecret Your personal Api secret
		 * @param string $tenant Your personal ChannelEngine name. If your ChannelEngine Url is https://yourshop.channelengine.net your personal name is "yourshop"
		 */
		public function __construct($apiKey, $apiSecret, $tenant, $environment = null)
		{
			if($environment == null || $environment == self::ENV_PRODUCTION){
				$this->apiUrl = sprintf(self::PROD_URL, $tenant);
			}elseif($environment == self::ENV_ACCEPTATION){
				$this->apiUrl = sprintf(self::ACC_URL, $tenant);
			}elseif($environment == self::ENV_DEVELOPMENT){
				$this->apiUrl = sprintf(self::DEV_URL, $tenant);
			}

			$this->environment = $environment;
			$this->tenant = $tenant;
			$this->apiKey = $apiKey;
			$this->apiSecret = $apiSecret;
			$this->certificate = __DIR__ . DIRECTORY_SEPARATOR . (self::USE_FIDDLER ? self::FIDDLER_CERTIFICATE_PATH : self::CERTIFICATE_PATH);
		}
		
		/* Public API methods */
		
		/* ORDERS */
		
		/**
		 * Gets all orders with selected parameters
		 * @param array $statuses An array of ChannelEngineApiClient\Enums\OrderStatus or NULL for all new orders.
		 * @param DateTime $dateFrom Filter orders from the given date
		 * @param DateTime $dateTo Filter orders until the given date
		 * @return ChannelEngineApiClient\Helpers\MerchantOrderCollection The retrieved orders
		 */
		public function getOrders(array $statuses = array(OrderStatus::NEW_ORDER), \DateTime $dateFrom = null, \DateTime $dateTo = null)
		{
			$args = array();
			$args['OrderStatus'] = $statuses;
			$args = $this->addDateArgs($dateFrom, $dateTo, $args);

			$url = self::BASE_PATH . self::ORDERS_PATH;
			$result = $this->makeRequest(HttpMethod::GET, $url, $this->createQueryString($args));
			return JsonMapper::fromJson($result, 'ChannelEngineApiClient\Helpers\Collection(ChannelEngineApiClient\Models\Order)');
		}
		
		/* SHIPMENTS */
		
		/**
		 * Create a new shipment for the given order with the given lines 
		 * @param ChannelEngineApiClient\Models\Shipment $shipment The shipment to send
		 */
		public function postShipment(\ChannelEngineApiClient\Models\Shipment $shipment)
		{
			$url = self::BASE_PATH . self::SHIPMENTS_PATH;
			$this->makeRequest(HttpMethod::POST, $url, '', JsonMapper::toJson($shipment));
			return JsonMapper::fromJson($result, 'ChannelEngineApiClient\Models\Shipment');
		}
		
		/* RETURNS */
		
		/**
		 * Gets all orders with selected parameters
		 * @param array $statuses An array of ChannelEngineApiClient\Enums\ReturnStatus or NULL for all declared returns
		 * @param DateTime $dateFrom Filter returns from the given date
		 * @param DateTime $dateTo Filter returns until the given date
		 * @return ChannelEngineApiClient\Helpers\ReturnCollection The retrieved returns
		 */
		public function getReturns(array $statuses = array(ReturnStatus::DECLARED), \DateTime $dateFrom = null, \DateTime $dateTo = null)
		{
			$args = array();
			$args['Status'] = $statuses;
			$args = $this->addDateArgs($dateFrom, $dateTo, $args);

			$url = self::BASE_PATH . self::RETURNS_PATH;
			$result = $this->makeRequest(HttpMethod::GET, $url, $this->createQueryString($args));
			return JsonMapper::fromJson($result, 'ChannelEngineApiClient\Helpers\Collection(ChannelEngineApiClient\Models\ReturnObject)');
		}
		
		/**
		 * Create a new return for the given shipment with the given lines
		 * @param ChannelEngineApiClient\Models\ReturnObject $return The shipment to send
		 */
		public function postReturn(\ChannelEngineApiClient\Models\ReturnObject $return)
		{		
			$url = self::BASE_PATH . self::RETURNS_PATH;
			$result = $this->makeRequest(HttpMethod::POST, $url, '', JsonMapper::toJson($return));
			return JsonMapper::fromJson($result, 'ChannelEngineApiClient\Models\ReturnObject');
		}
		
		/**
		 * Updates the status of the given return
		 * @param ChannelEngineApiClient\Models\ReturnObject $return The return to update
		 */
		public function putReturn(\ChannelEngineApiClient\Models\ReturnObject $return)
		{
			$url = self::BASE_PATH . self::RETURNS_PATH;
			$result = $this->makeRequest(HttpMethod::PUT, $url, '', JsonMapper::toJson($return));	
			return JsonMapper::fromJson($result, 'ChannelEngineApiClient\Models\ReturnObject');
		}		
		
		/* Private methods */
		
		private function makeRequest($method, $url, $queryString = '', $content = null)
		{
			$request = curl_init();
			
			// Create the required Http headers and Hmac signature
			$headers = $this->buildHeaders($method, $url, $content);
			
			if(self::USE_FIDDLER)
			{				
				// We use this to redirect the request through a local proxy and trace it with fiddler
				curl_setopt($request, CURLOPT_PROXY, self::FIDDLER_PROXY);
			}
			
			// Set the Url
			curl_setopt($request, CURLOPT_URL, $this->apiUrl . $url . $queryString);
			
			// Add the headers and hmac auth.
			curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
			
			// Return the response as a string
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			
			// Set custom request method because curl has no setting for PUT and DELETE
			curl_setopt($request, CURLOPT_CUSTOMREQUEST, $method);
			
			// Make the headers accessible for debugging purposes
			curl_setopt($request, CURLINFO_HEADER_OUT, true);

			// Point curl to the correct certificate.
			// See: http://stackoverflow.com/questions/6400300/php-curl-https-causing-exception-ssl-certificate-problem-verify-that-the-ca-cer
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, true); 
			curl_setopt($request, CURLOPT_CAINFO, $this->certificate);				
			
			// If we have a request body send it too
			if(strlen($content) > 0)
				curl_setopt($request, CURLOPT_POSTFIELDS, $content);
			
			// Make the request
			$response = curl_exec($request);
			
			// Get the status code
			$status = curl_getinfo($request, CURLINFO_HTTP_CODE);				
			
			// Check for errors
			// First we check if the response is missing which will probably be caused by a cURL error
			// After this the check if there are not HTTP errors (status codes other than 200-206)
			if ($response === false)
			{
				$error = curl_error($request);
				curl_close($request);
				throw new Exception('cURL error: ' . $error);
			}
			else if($status < 200 || $status > 206)
			{
				$headers = curl_getinfo($request, CURLINFO_HEADER_OUT);
				$message = JsonMapper::fromJson($response, 'ChannelEngineApiClient\Models\Message');
				curl_close($request);
					
				throw new Exception('Output headers: '. "\n" . $headers ."\n\n".
									'Content: ' . $content ."\n\n".
									'Unexpected status code [' . $status . ']. The server returned the following message: "' . $message->getMessage() . '"');
			}
			else
			{
				curl_close($request);
				
				return $response;
			}
		}
		
		private function buildHeaders($method, $url, $content = null)
		{
			$date = time(); 
			$headers = array(
				'Accept: application/json',
				'Authorization: HMAC ' . $this->apiKey . ':' . $this->calculateHmac($method, $url, $date, $content),
				'Content-Type: application/json; charset=utf-8',
				'Content-Length: ' . strlen($content),
				'Content-MD5: ' . ((strlen($content) > 0) ? base64_encode(md5($content, true)) : ''),
				'Date: ' . gmdate('D, d M Y H:i:s', $date) . ' GMT',
			);
			
			return $headers;
		}
		
        /*
		Builds message representation as follows:
        
		Timestamp\n +
        HTTP METHOD\n +
        Request URI
        Content-MD5 (base64)\n +  
        apikey\n +
		
		*/
		private function calculateHmac($method, $url, $date, $content = null)
		{
			$representation = array(
				gmdate('m/d/Y H:i:s', $date),
				$method,
				$url,
				(strlen($content) > 0) ? base64_encode(md5($content, true)) : '',
				$this->apiKey
			);
			
			
			$representationString = implode("\n", $representation);	
			
			$hash = hash_hmac('sha256', utf8_encode($representationString), utf8_encode($this->apiSecret), true);
			$signature = base64_encode($hash);
			
			return $signature;
		}
		
		private function createQueryString(array $args)
		{
			$queryString = (count($args) > 0) ? '?' . http_build_query($args) : '';	
			
			// .Net does not seem to like the /?foo[0]=bar&foo[1]=baz notation so we
			// convert it to /?foo=bar&foo=baz
			return preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', $queryString);
		}
		
		private function addDateArgs(\DateTime $dateFrom = null, \DateTime $dateTo = null, array $args)
		{
			if(!is_null($dateFrom)) $args['FromDate'] = $dateFrom->format('Y-m-d H:i:s');
			if(!is_null($dateTo)) $args['ToDate'] = $dateTo->format('Y-m-d H:i:s');
			return $args;
		}
	}
}