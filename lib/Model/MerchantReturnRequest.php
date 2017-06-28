<?php
/**
 * MerchantReturnRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  ChannelEngine\ApiClient
 * @author   Swaagger Codegen team
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

namespace ChannelEngine\ApiClient\Model;

use \ArrayAccess;

/**
 * MerchantReturnRequest Class Doc Comment
 *
 * @category    Class
 * @package     ChannelEngine\ApiClient
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class MerchantReturnRequest implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'MerchantReturnRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'merchantOrderNo' => 'string',
        'merchantReturnNo' => 'string',
        'lines' => '\ChannelEngine\ApiClient\Model\MerchantReturnLineRequest[]',
        'reason' => 'string',
        'customerComment' => 'string',
        'merchantComment' => 'string',
        'refundInclVat' => 'double',
        'refundExclVat' => 'double'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'merchantOrderNo' => 'MerchantOrderNo',
        'merchantReturnNo' => 'MerchantReturnNo',
        'lines' => 'Lines',
        'reason' => 'Reason',
        'customerComment' => 'CustomerComment',
        'merchantComment' => 'MerchantComment',
        'refundInclVat' => 'RefundInclVat',
        'refundExclVat' => 'RefundExclVat'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'merchantOrderNo' => 'setMerchantOrderNo',
        'merchantReturnNo' => 'setMerchantReturnNo',
        'lines' => 'setLines',
        'reason' => 'setReason',
        'customerComment' => 'setCustomerComment',
        'merchantComment' => 'setMerchantComment',
        'refundInclVat' => 'setRefundInclVat',
        'refundExclVat' => 'setRefundExclVat'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'merchantOrderNo' => 'getMerchantOrderNo',
        'merchantReturnNo' => 'getMerchantReturnNo',
        'lines' => 'getLines',
        'reason' => 'getReason',
        'customerComment' => 'getCustomerComment',
        'merchantComment' => 'getMerchantComment',
        'refundInclVat' => 'getRefundInclVat',
        'refundExclVat' => 'getRefundExclVat'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    const REASON_PRODUCT_DEFECT = 'PRODUCT_DEFECT';
    const REASON_PRODUCT_UNSATISFACTORY = 'PRODUCT_UNSATISFACTORY';
    const REASON_REFUSED = 'REFUSED';
    const REASON_REFUSED_DAMAGED = 'REFUSED_DAMAGED';
    const REASON_WRONG_ADDRESS = 'WRONG_ADDRESS';
    const REASON_NOT_COLLECTED = 'NOT_COLLECTED';
    const REASON_OTHER = 'OTHER';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getReasonAllowableValues()
    {
        return [
            self::REASON_PRODUCT_DEFECT,
            self::REASON_PRODUCT_UNSATISFACTORY,
            self::REASON_REFUSED,
            self::REASON_REFUSED_DAMAGED,
            self::REASON_WRONG_ADDRESS,
            self::REASON_NOT_COLLECTED,
            self::REASON_OTHER,
        ];
    }
    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['merchantOrderNo'] = isset($data['merchantOrderNo']) ? $data['merchantOrderNo'] : null;
        $this->container['merchantReturnNo'] = isset($data['merchantReturnNo']) ? $data['merchantReturnNo'] : null;
        $this->container['lines'] = isset($data['lines']) ? $data['lines'] : null;
        $this->container['reason'] = isset($data['reason']) ? $data['reason'] : null;
        $this->container['customerComment'] = isset($data['customerComment']) ? $data['customerComment'] : null;
        $this->container['merchantComment'] = isset($data['merchantComment']) ? $data['merchantComment'] : null;
        $this->container['refundInclVat'] = isset($data['refundInclVat']) ? $data['refundInclVat'] : null;
        $this->container['refundExclVat'] = isset($data['refundExclVat']) ? $data['refundExclVat'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['merchantOrderNo'] === null) {
            $invalid_properties[] = "'merchantOrderNo' can't be null";
        }
        if ($this->container['merchantReturnNo'] === null) {
            $invalid_properties[] = "'merchantReturnNo' can't be null";
        }
        if ($this->container['lines'] === null) {
            $invalid_properties[] = "'lines' can't be null";
        }
        $allowed_values = ["PRODUCT_DEFECT", "PRODUCT_UNSATISFACTORY", "REFUSED", "REFUSED_DAMAGED", "WRONG_ADDRESS", "NOT_COLLECTED", "OTHER"];
        if (!in_array($this->container['reason'], $allowed_values)) {
            $invalid_properties[] = "invalid value for 'reason', must be one of 'PRODUCT_DEFECT', 'PRODUCT_UNSATISFACTORY', 'REFUSED', 'REFUSED_DAMAGED', 'WRONG_ADDRESS', 'NOT_COLLECTED', 'OTHER'.";
        }

        if (!is_null($this->container['customerComment']) && (strlen($this->container['customerComment']) > 4001)) {
            $invalid_properties[] = "invalid value for 'customerComment', the character length must be smaller than or equal to 4001.";
        }

        if (!is_null($this->container['customerComment']) && (strlen($this->container['customerComment']) < 0)) {
            $invalid_properties[] = "invalid value for 'customerComment', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['merchantComment']) && (strlen($this->container['merchantComment']) > 4001)) {
            $invalid_properties[] = "invalid value for 'merchantComment', the character length must be smaller than or equal to 4001.";
        }

        if (!is_null($this->container['merchantComment']) && (strlen($this->container['merchantComment']) < 0)) {
            $invalid_properties[] = "invalid value for 'merchantComment', the character length must be bigger than or equal to 0.";
        }

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['merchantOrderNo'] === null) {
            return false;
        }
        if ($this->container['merchantReturnNo'] === null) {
            return false;
        }
        if ($this->container['lines'] === null) {
            return false;
        }
        $allowed_values = ["PRODUCT_DEFECT", "PRODUCT_UNSATISFACTORY", "REFUSED", "REFUSED_DAMAGED", "WRONG_ADDRESS", "NOT_COLLECTED", "OTHER"];
        if (!in_array($this->container['reason'], $allowed_values)) {
            return false;
        }
        if (strlen($this->container['customerComment']) > 4001) {
            return false;
        }
        if (strlen($this->container['customerComment']) < 0) {
            return false;
        }
        if (strlen($this->container['merchantComment']) > 4001) {
            return false;
        }
        if (strlen($this->container['merchantComment']) < 0) {
            return false;
        }
        return true;
    }


    /**
     * Gets merchantOrderNo
     * @return string
     */
    public function getMerchantOrderNo()
    {
        return $this->container['merchantOrderNo'];
    }

    /**
     * Sets merchantOrderNo
     * @param string $merchantOrderNo
     * @return $this
     */
    public function setMerchantOrderNo($merchantOrderNo)
    {
        $this->container['merchantOrderNo'] = $merchantOrderNo;

        return $this;
    }

    /**
     * Gets merchantReturnNo
     * @return string
     */
    public function getMerchantReturnNo()
    {
        return $this->container['merchantReturnNo'];
    }

    /**
     * Sets merchantReturnNo
     * @param string $merchantReturnNo
     * @return $this
     */
    public function setMerchantReturnNo($merchantReturnNo)
    {
        $this->container['merchantReturnNo'] = $merchantReturnNo;

        return $this;
    }

    /**
     * Gets lines
     * @return \ChannelEngine\ApiClient\Model\MerchantReturnLineRequest[]
     */
    public function getLines()
    {
        return $this->container['lines'];
    }

    /**
     * Sets lines
     * @param \ChannelEngine\ApiClient\Model\MerchantReturnLineRequest[] $lines
     * @return $this
     */
    public function setLines($lines)
    {
        $this->container['lines'] = $lines;

        return $this;
    }

    /**
     * Gets reason
     * @return string
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $allowed_values = array('PRODUCT_DEFECT', 'PRODUCT_UNSATISFACTORY', 'REFUSED', 'REFUSED_DAMAGED', 'WRONG_ADDRESS', 'NOT_COLLECTED', 'OTHER');
        if (!is_null($reason) && (!in_array($reason, $allowed_values))) {
            throw new \InvalidArgumentException("Invalid value for 'reason', must be one of 'PRODUCT_DEFECT', 'PRODUCT_UNSATISFACTORY', 'REFUSED', 'REFUSED_DAMAGED', 'WRONG_ADDRESS', 'NOT_COLLECTED', 'OTHER'");
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets customerComment
     * @return string
     */
    public function getCustomerComment()
    {
        return $this->container['customerComment'];
    }

    /**
     * Sets customerComment
     * @param string $customerComment
     * @return $this
     */
    public function setCustomerComment($customerComment)
    {
        if (!is_null($customerComment) && (strlen($customerComment) > 4001)) {
            throw new \InvalidArgumentException('invalid length for $customerComment when calling MerchantReturnRequest., must be smaller than or equal to 4001.');
        }
        if (!is_null($customerComment) && (strlen($customerComment) < 0)) {
            throw new \InvalidArgumentException('invalid length for $customerComment when calling MerchantReturnRequest., must be bigger than or equal to 0.');
        }

        $this->container['customerComment'] = $customerComment;

        return $this;
    }

    /**
     * Gets merchantComment
     * @return string
     */
    public function getMerchantComment()
    {
        return $this->container['merchantComment'];
    }

    /**
     * Sets merchantComment
     * @param string $merchantComment
     * @return $this
     */
    public function setMerchantComment($merchantComment)
    {
        if (!is_null($merchantComment) && (strlen($merchantComment) > 4001)) {
            throw new \InvalidArgumentException('invalid length for $merchantComment when calling MerchantReturnRequest., must be smaller than or equal to 4001.');
        }
        if (!is_null($merchantComment) && (strlen($merchantComment) < 0)) {
            throw new \InvalidArgumentException('invalid length for $merchantComment when calling MerchantReturnRequest., must be bigger than or equal to 0.');
        }

        $this->container['merchantComment'] = $merchantComment;

        return $this;
    }

    /**
     * Gets refundInclVat
     * @return double
     */
    public function getRefundInclVat()
    {
        return $this->container['refundInclVat'];
    }

    /**
     * Sets refundInclVat
     * @param double $refundInclVat
     * @return $this
     */
    public function setRefundInclVat($refundInclVat)
    {
        $this->container['refundInclVat'] = $refundInclVat;

        return $this;
    }

    /**
     * Gets refundExclVat
     * @return double
     */
    public function getRefundExclVat()
    {
        return $this->container['refundExclVat'];
    }

    /**
     * Sets refundExclVat
     * @param double $refundExclVat
     * @return $this
     */
    public function setRefundExclVat($refundExclVat)
    {
        $this->container['refundExclVat'] = $refundExclVat;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\ChannelEngine\ApiClient\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\ChannelEngine\ApiClient\ObjectSerializer::sanitizeForSerialization($this));
    }
}

