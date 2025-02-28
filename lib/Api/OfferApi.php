<?php
/**
 * OfferApi
 * PHP version 7.2
 *
 * @category Class
 * @package  ChannelEngine\Merchant\ApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * ChannelEngine Merchant API
 *
 * ChannelEngine API for merchants
 *
 * The version of the OpenAPI document: 2.9.4
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace ChannelEngine\Merchant\ApiClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use ChannelEngine\Merchant\ApiClient\ApiException;
use ChannelEngine\Merchant\ApiClient\Configuration;
use ChannelEngine\Merchant\ApiClient\HeaderSelector;
use ChannelEngine\Merchant\ApiClient\ObjectSerializer;

/**
 * OfferApi Class Doc Comment
 *
 * @category Class
 * @package  ChannelEngine\Merchant\ApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OfferApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation offerGetStock
     *
     * Get stock for products.
     *
     * @param  string[] $skus List of your products&#39; sku&#39;s. (required)
     * @param  int[] $stockLocationIds The ChannelEngine id of the stock location(s). (required)
     *
     * @throws \ChannelEngine\Merchant\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse
     */
    public function offerGetStock($skus, $stockLocationIds)
    {
        list($response) = $this->offerGetStockWithHttpInfo($skus, $stockLocationIds);
        return $response;
    }

    /**
     * Operation offerGetStockWithHttpInfo
     *
     * Get stock for products.
     *
     * @param  string[] $skus List of your products&#39; sku&#39;s. (required)
     * @param  int[] $stockLocationIds The ChannelEngine id of the stock location(s). (required)
     *
     * @throws \ChannelEngine\Merchant\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function offerGetStockWithHttpInfo($skus, $stockLocationIds)
    {
        $request = $this->offerGetStockRequest($skus, $stockLocationIds);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation offerGetStockAsync
     *
     * Get stock for products.
     *
     * @param  string[] $skus List of your products&#39; sku&#39;s. (required)
     * @param  int[] $stockLocationIds The ChannelEngine id of the stock location(s). (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function offerGetStockAsync($skus, $stockLocationIds)
    {
        return $this->offerGetStockAsyncWithHttpInfo($skus, $stockLocationIds)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation offerGetStockAsyncWithHttpInfo
     *
     * Get stock for products.
     *
     * @param  string[] $skus List of your products&#39; sku&#39;s. (required)
     * @param  int[] $stockLocationIds The ChannelEngine id of the stock location(s). (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function offerGetStockAsyncWithHttpInfo($skus, $stockLocationIds)
    {
        $returnType = '\ChannelEngine\Merchant\ApiClient\Model\CollectionOfMerchantOfferGetStockResponse';
        $request = $this->offerGetStockRequest($skus, $stockLocationIds);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'offerGetStock'
     *
     * @param  string[] $skus List of your products&#39; sku&#39;s. (required)
     * @param  int[] $stockLocationIds The ChannelEngine id of the stock location(s). (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function offerGetStockRequest($skus, $stockLocationIds)
    {
        // verify the required parameter 'skus' is set
        if ($skus === null || (is_array($skus) && count($skus) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $skus when calling offerGetStock'
            );
        }
        // verify the required parameter 'stockLocationIds' is set
        if ($stockLocationIds === null || (is_array($stockLocationIds) && count($stockLocationIds) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $stockLocationIds when calling offerGetStock'
            );
        }

        $resourcePath = '/v2/offer/stock';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($skus !== null) {
            if('form' === 'form' && is_array($skus)) {
                foreach($skus as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['skus'] = $skus;
            }
        }
        // query params
        if ($stockLocationIds !== null) {
            if('form' === 'form' && is_array($stockLocationIds)) {
                foreach($stockLocationIds as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['stockLocationIds'] = $stockLocationIds;
            }
        }



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation offerStockPriceUpdate
     *
     * Update stock or price.
     *
     * @param  \ChannelEngine\Merchant\ApiClient\Model\MerchantStockPriceUpdateRequest[] $merchantStockPriceUpdateRequest References to the products that should be updated, and the new values&lt;br /&gt;for the stock or price fields. It is possible to supply only one of the two fields&lt;br /&gt;or both. (optional)
     *
     * @throws \ChannelEngine\Merchant\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString
     */
    public function offerStockPriceUpdate($merchantStockPriceUpdateRequest = null)
    {
        list($response) = $this->offerStockPriceUpdateWithHttpInfo($merchantStockPriceUpdateRequest);
        return $response;
    }

    /**
     * Operation offerStockPriceUpdateWithHttpInfo
     *
     * Update stock or price.
     *
     * @param  \ChannelEngine\Merchant\ApiClient\Model\MerchantStockPriceUpdateRequest[] $merchantStockPriceUpdateRequest References to the products that should be updated, and the new values&lt;br /&gt;for the stock or price fields. It is possible to supply only one of the two fields&lt;br /&gt;or both. (optional)
     *
     * @throws \ChannelEngine\Merchant\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString, HTTP status code, HTTP response headers (array of strings)
     */
    public function offerStockPriceUpdateWithHttpInfo($merchantStockPriceUpdateRequest = null)
    {
        $request = $this->offerStockPriceUpdateRequest($merchantStockPriceUpdateRequest);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation offerStockPriceUpdateAsync
     *
     * Update stock or price.
     *
     * @param  \ChannelEngine\Merchant\ApiClient\Model\MerchantStockPriceUpdateRequest[] $merchantStockPriceUpdateRequest References to the products that should be updated, and the new values&lt;br /&gt;for the stock or price fields. It is possible to supply only one of the two fields&lt;br /&gt;or both. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function offerStockPriceUpdateAsync($merchantStockPriceUpdateRequest = null)
    {
        return $this->offerStockPriceUpdateAsyncWithHttpInfo($merchantStockPriceUpdateRequest)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation offerStockPriceUpdateAsyncWithHttpInfo
     *
     * Update stock or price.
     *
     * @param  \ChannelEngine\Merchant\ApiClient\Model\MerchantStockPriceUpdateRequest[] $merchantStockPriceUpdateRequest References to the products that should be updated, and the new values&lt;br /&gt;for the stock or price fields. It is possible to supply only one of the two fields&lt;br /&gt;or both. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function offerStockPriceUpdateAsyncWithHttpInfo($merchantStockPriceUpdateRequest = null)
    {
        $returnType = '\ChannelEngine\Merchant\ApiClient\Model\SingleOfDictionaryOfStringAndListOfString';
        $request = $this->offerStockPriceUpdateRequest($merchantStockPriceUpdateRequest);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'offerStockPriceUpdate'
     *
     * @param  \ChannelEngine\Merchant\ApiClient\Model\MerchantStockPriceUpdateRequest[] $merchantStockPriceUpdateRequest References to the products that should be updated, and the new values&lt;br /&gt;for the stock or price fields. It is possible to supply only one of the two fields&lt;br /&gt;or both. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function offerStockPriceUpdateRequest($merchantStockPriceUpdateRequest = null)
    {

        $resourcePath = '/v2/offer';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // body params
        $_tempBody = null;
        if (isset($merchantStockPriceUpdateRequest)) {
            $_tempBody = $merchantStockPriceUpdateRequest;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json-patch+json', 'application/json', 'application/_*+json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
