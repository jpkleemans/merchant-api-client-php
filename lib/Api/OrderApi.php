<?php
/**
 * OrderApi
 * PHP version 5
 *
 * @category Class
 * @package  ChannelEngine\ApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * ChannelEngine API V2
 *
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 2.1.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace ChannelEngine\ApiClient\Api;

use \ChannelEngine\ApiClient\ApiClient;
use \ChannelEngine\ApiClient\ApiException;
use \ChannelEngine\ApiClient\Configuration;
use \ChannelEngine\ApiClient\ObjectSerializer;

/**
 * OrderApi Class Doc Comment
 *
 * @category Class
 * @package  ChannelEngine\ApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OrderApi
{
    /**
     * API Client
     *
     * @var \ChannelEngine\ApiClient\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \ChannelEngine\ApiClient\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\ChannelEngine\ApiClient\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \ChannelEngine\ApiClient\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \ChannelEngine\ApiClient\ApiClient $apiClient set the API client
     *
     * @return OrderApi
     */
    public function setApiClient(\ChannelEngine\ApiClient\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation orderAcknowledge
     *
     * Merchant: Acknowledge Order
     *
     * @param \ChannelEngine\ApiClient\Model\OrderAcknowledgement $model Relations between the id&#39;s returned by ChannelEngine and the references which the merchant uses (required)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return \ChannelEngine\ApiClient\Model\ApiResponse
     */
    public function orderAcknowledge($model)
    {
        list($response) = $this->orderAcknowledgeWithHttpInfo($model);
        return $response;
    }

    /**
     * Operation orderAcknowledgeWithHttpInfo
     *
     * Merchant: Acknowledge Order
     *
     * @param \ChannelEngine\ApiClient\Model\OrderAcknowledgement $model Relations between the id&#39;s returned by ChannelEngine and the references which the merchant uses (required)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return array of \ChannelEngine\ApiClient\Model\ApiResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderAcknowledgeWithHttpInfo($model)
    {
        // verify the required parameter 'model' is set
        if ($model === null) {
            throw new \InvalidArgumentException('Missing the required parameter $model when calling orderAcknowledge');
        }
        // parse inputs
        $resourcePath = "/v2/orders/acknowledge";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json', 'text/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json', 'text/json', 'application/xml', 'text/xml', 'application/x-www-form-urlencoded']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($model)) {
            $_tempBody = $model;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('apikey');
        if (strlen($apiKey) !== 0) {
            $queryParams['apikey'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\ChannelEngine\ApiClient\Model\ApiResponse',
                '/v2/orders/acknowledge'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\ChannelEngine\ApiClient\Model\ApiResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\ChannelEngine\ApiClient\Model\ApiResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation orderCreate
     *
     * Channel: Create Order
     *
     * @param \ChannelEngine\ApiClient\Model\ChannelOrderRequest $model  (required)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return \ChannelEngine\ApiClient\Model\ApiResponse
     */
    public function orderCreate($model)
    {
        list($response) = $this->orderCreateWithHttpInfo($model);
        return $response;
    }

    /**
     * Operation orderCreateWithHttpInfo
     *
     * Channel: Create Order
     *
     * @param \ChannelEngine\ApiClient\Model\ChannelOrderRequest $model  (required)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return array of \ChannelEngine\ApiClient\Model\ApiResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderCreateWithHttpInfo($model)
    {
        // verify the required parameter 'model' is set
        if ($model === null) {
            throw new \InvalidArgumentException('Missing the required parameter $model when calling orderCreate');
        }
        // parse inputs
        $resourcePath = "/v2/orders";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json', 'text/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json', 'text/json', 'application/x-www-form-urlencoded']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($model)) {
            $_tempBody = $model;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('apikey');
        if (strlen($apiKey) !== 0) {
            $queryParams['apikey'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\ChannelEngine\ApiClient\Model\ApiResponse',
                '/v2/orders'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\ChannelEngine\ApiClient\Model\ApiResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\ChannelEngine\ApiClient\Model\ApiResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation orderGetNew
     *
     * Merchant: Get New Orders
     *
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return \ChannelEngine\ApiClient\Model\CollectionOfMerchantOrderResponse
     */
    public function orderGetNew()
    {
        list($response) = $this->orderGetNewWithHttpInfo();
        return $response;
    }

    /**
     * Operation orderGetNewWithHttpInfo
     *
     * Merchant: Get New Orders
     *
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return array of \ChannelEngine\ApiClient\Model\CollectionOfMerchantOrderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderGetNewWithHttpInfo()
    {
        // parse inputs
        $resourcePath = "/v2/orders/new";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json', 'text/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('apikey');
        if (strlen($apiKey) !== 0) {
            $queryParams['apikey'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\ChannelEngine\ApiClient\Model\CollectionOfMerchantOrderResponse',
                '/v2/orders/new'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\ChannelEngine\ApiClient\Model\CollectionOfMerchantOrderResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\ChannelEngine\ApiClient\Model\CollectionOfMerchantOrderResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation orderInvoice
     *
     * Merchant: Download Invoice
     *
     * @param string $merchantOrderNo The unique order reference as used by the merchant (required)
     * @param bool $useCustomerCulture Generate the invoice in the billing address&#39; country&#39;s language (optional)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return \SplFileObject
     */
    public function orderInvoice($merchantOrderNo, $useCustomerCulture = null)
    {
        list($response) = $this->orderInvoiceWithHttpInfo($merchantOrderNo, $useCustomerCulture);
        return $response;
    }

    /**
     * Operation orderInvoiceWithHttpInfo
     *
     * Merchant: Download Invoice
     *
     * @param string $merchantOrderNo The unique order reference as used by the merchant (required)
     * @param bool $useCustomerCulture Generate the invoice in the billing address&#39; country&#39;s language (optional)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderInvoiceWithHttpInfo($merchantOrderNo, $useCustomerCulture = null)
    {
        // verify the required parameter 'merchantOrderNo' is set
        if ($merchantOrderNo === null) {
            throw new \InvalidArgumentException('Missing the required parameter $merchantOrderNo when calling orderInvoice');
        }
        // parse inputs
        $resourcePath = "/v2/orders/{merchantOrderNo}/invoice";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/pdf']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($useCustomerCulture !== null) {
            $queryParams['useCustomerCulture'] = $this->apiClient->getSerializer()->toQueryValue($useCustomerCulture);
        }
        // path params
        if ($merchantOrderNo !== null) {
            $resourcePath = str_replace(
                "{" . "merchantOrderNo" . "}",
                $this->apiClient->getSerializer()->toPathValue($merchantOrderNo),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('apikey');
        if (strlen($apiKey) !== 0) {
            $queryParams['apikey'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SplFileObject',
                '/v2/orders/{merchantOrderNo}/invoice'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SplFileObject', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation orderPackingSlip
     *
     * Merchant: Download Packing Slip
     *
     * @param string $merchantOrderNo The unique order reference as used by the merchant (required)
     * @param bool $useCustomerCulture Generate the invoice in the billing address&#39; country&#39;s language (optional)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return \SplFileObject
     */
    public function orderPackingSlip($merchantOrderNo, $useCustomerCulture = null)
    {
        list($response) = $this->orderPackingSlipWithHttpInfo($merchantOrderNo, $useCustomerCulture);
        return $response;
    }

    /**
     * Operation orderPackingSlipWithHttpInfo
     *
     * Merchant: Download Packing Slip
     *
     * @param string $merchantOrderNo The unique order reference as used by the merchant (required)
     * @param bool $useCustomerCulture Generate the invoice in the billing address&#39; country&#39;s language (optional)
     * @throws \ChannelEngine\ApiClient\ApiException on non-2xx response
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderPackingSlipWithHttpInfo($merchantOrderNo, $useCustomerCulture = null)
    {
        // verify the required parameter 'merchantOrderNo' is set
        if ($merchantOrderNo === null) {
            throw new \InvalidArgumentException('Missing the required parameter $merchantOrderNo when calling orderPackingSlip');
        }
        // parse inputs
        $resourcePath = "/v2/orders/{merchantOrderNo}/packingslip";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/pdf']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($useCustomerCulture !== null) {
            $queryParams['useCustomerCulture'] = $this->apiClient->getSerializer()->toQueryValue($useCustomerCulture);
        }
        // path params
        if ($merchantOrderNo !== null) {
            $resourcePath = str_replace(
                "{" . "merchantOrderNo" . "}",
                $this->apiClient->getSerializer()->toPathValue($merchantOrderNo),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('apikey');
        if (strlen($apiKey) !== 0) {
            $queryParams['apikey'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SplFileObject',
                '/v2/orders/{merchantOrderNo}/packingslip'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SplFileObject', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}