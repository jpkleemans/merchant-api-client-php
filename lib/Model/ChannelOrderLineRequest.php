<?php
/**
 * ChannelOrderLineRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * ChannelEngine API V2
 *
 * No descripton provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: v2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * ChannelOrderLineRequest Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ChannelOrderLineRequest implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ChannelOrderLineRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'channel_product_reference' => 'string',
        'quantity' => 'int',
        'unit_price_incl_vat' => 'double',
        'fee_fixed' => 'double',
        'fee_rate' => 'double'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'channel_product_reference' => 'ChannelProductReference',
        'quantity' => 'Quantity',
        'unit_price_incl_vat' => 'UnitPriceInclVat',
        'fee_fixed' => 'FeeFixed',
        'fee_rate' => 'FeeRate'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'channel_product_reference' => 'setChannelProductReference',
        'quantity' => 'setQuantity',
        'unit_price_incl_vat' => 'setUnitPriceInclVat',
        'fee_fixed' => 'setFeeFixed',
        'fee_rate' => 'setFeeRate'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'channel_product_reference' => 'getChannelProductReference',
        'quantity' => 'getQuantity',
        'unit_price_incl_vat' => 'getUnitPriceInclVat',
        'fee_fixed' => 'getFeeFixed',
        'fee_rate' => 'getFeeRate'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['channel_product_reference'] = isset($data['channel_product_reference']) ? $data['channel_product_reference'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['unit_price_incl_vat'] = isset($data['unit_price_incl_vat']) ? $data['unit_price_incl_vat'] : null;
        $this->container['fee_fixed'] = isset($data['fee_fixed']) ? $data['fee_fixed'] : null;
        $this->container['fee_rate'] = isset($data['fee_rate']) ? $data['fee_rate'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if ($this->container['channel_product_reference'] === null) {
            $invalid_properties[] = "'channel_product_reference' can't be null";
        }
        if ((strlen($this->container['channel_product_reference']) > 50)) {
            $invalid_properties[] = "invalid value for 'channel_product_reference', the character length must be smaller than or equal to 50.";
        }

        if ((strlen($this->container['channel_product_reference']) < 0)) {
            $invalid_properties[] = "invalid value for 'channel_product_reference', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['quantity'] === null) {
            $invalid_properties[] = "'quantity' can't be null";
        }
        if ($this->container['unit_price_incl_vat'] === null) {
            $invalid_properties[] = "'unit_price_incl_vat' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        if ($this->container['channel_product_reference'] === null) {
            return false;
        }
        if (strlen($this->container['channel_product_reference']) > 50) {
            return false;
        }
        if (strlen($this->container['channel_product_reference']) < 0) {
            return false;
        }
        if ($this->container['quantity'] === null) {
            return false;
        }
        if ($this->container['unit_price_incl_vat'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets channel_product_reference
     * @return string
     */
    public function getChannelProductReference()
    {
        return $this->container['channel_product_reference'];
    }

    /**
     * Sets channel_product_reference
     * @param string $channel_product_reference An orderline is supposed to only reference one product. Furthermore,  multiple orderlines cannot reference the same product. Therefore we can  use the product reference as a reference for the orderline. The reference of  the order and the product reference uniquely identify an orderline.
     * @return $this
     */
    public function setChannelProductReference($channel_product_reference)
    {
        if (strlen($channel_product_reference) > 50) {
            throw new \InvalidArgumentException('invalid length for $channel_product_reference when calling ChannelOrderLineRequest., must be smaller than or equal to 50.');
        }
        if (strlen($channel_product_reference) < 0) {
            throw new \InvalidArgumentException('invalid length for $channel_product_reference when calling ChannelOrderLineRequest., must be bigger than or equal to 0.');
        }
        $this->container['channel_product_reference'] = $channel_product_reference;

        return $this;
    }

    /**
     * Gets quantity
     * @return int
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     * @param int $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets unit_price_incl_vat
     * @return double
     */
    public function getUnitPriceInclVat()
    {
        return $this->container['unit_price_incl_vat'];
    }

    /**
     * Sets unit_price_incl_vat
     * @param double $unit_price_incl_vat The value of a single unit of the ordered product including VAT  (in the tenant's base currency calculated using the exchange rate at the time of ordering).
     * @return $this
     */
    public function setUnitPriceInclVat($unit_price_incl_vat)
    {
        $this->container['unit_price_incl_vat'] = $unit_price_incl_vat;

        return $this;
    }

    /**
     * Gets fee_fixed
     * @return double
     */
    public function getFeeFixed()
    {
        return $this->container['fee_fixed'];
    }

    /**
     * Sets fee_fixed
     * @param double $fee_fixed A fixed fee that is charged by the Channel for this orderline.  This field is optional, send 0 if not applicable.
     * @return $this
     */
    public function setFeeFixed($fee_fixed)
    {
        $this->container['fee_fixed'] = $fee_fixed;

        return $this;
    }

    /**
     * Gets fee_rate
     * @return double
     */
    public function getFeeRate()
    {
        return $this->container['fee_rate'];
    }

    /**
     * Sets fee_rate
     * @param double $fee_rate A percentage fee that is charged by the Channel for this orderline.  This field is optional, send 0 if not applicable.
     * @return $this
     */
    public function setFeeRate($fee_rate)
    {
        $this->container['fee_rate'] = $fee_rate;

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
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}

