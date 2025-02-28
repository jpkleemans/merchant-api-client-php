<?php
/**
 * ReturnReason
 *
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

namespace ChannelEngine\Merchant\ApiClient\Model;
use \ChannelEngine\Merchant\ApiClient\ObjectSerializer;

/**
 * ReturnReason Class Doc Comment
 *
 * @category Class
 * @package  ChannelEngine\Merchant\ApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReturnReason
{
    /**
     * Possible values of this enum
     */
    const PRODUCT_DEFECT = 'PRODUCT_DEFECT';
    const PRODUCT_UNSATISFACTORY = 'PRODUCT_UNSATISFACTORY';
    const WRONG_PRODUCT = 'WRONG_PRODUCT';
    const TOO_MANY_PRODUCTS = 'TOO_MANY_PRODUCTS';
    const REFUSED = 'REFUSED';
    const REFUSED_DAMAGED = 'REFUSED_DAMAGED';
    const WRONG_ADDRESS = 'WRONG_ADDRESS';
    const NOT_COLLECTED = 'NOT_COLLECTED';
    const WRONG_SIZE = 'WRONG_SIZE';
    const OTHER = 'OTHER';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PRODUCT_DEFECT,
            self::PRODUCT_UNSATISFACTORY,
            self::WRONG_PRODUCT,
            self::TOO_MANY_PRODUCTS,
            self::REFUSED,
            self::REFUSED_DAMAGED,
            self::WRONG_ADDRESS,
            self::NOT_COLLECTED,
            self::WRONG_SIZE,
            self::OTHER,
        ];
    }
}


