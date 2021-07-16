<?php
namespace Sylapi\Feeds\Seznam\Models;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("param")
 * @Serializer\AccessType("public_method")
 */
class ProductDetail
{

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PARAM_NAME")
     */
    private $attributeName;
    
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("VAL")
     */
    private $attributeValue;

    /**
     * Get the value of attributeName
     */ 
    public function getAttributeName()
    {
        return $this->attributeName;
    }

    /**
     * Set the value of attributeName
     *
     * @return  self
     */ 
    public function setAttributeName($attributeName)
    {
        $this->attributeName = $attributeName;

        return $this;
    }

    /**
     * Get the value of attributeValue
     */ 
    public function getAttributeValue()
    {
        return $this->attributeValue;
    }

    /**
     * Set the value of attributeValue
     *
     * @return  self
     */ 
    public function setAttributeValue($attributeValue)
    {
        $this->attributeValue = $attributeValue;

        return $this;
    }

    public function make($shipping): self
    {
        $item  = new self;

        $itemVars = array_keys(get_class_vars(self::class));
    
        foreach($itemVars as $itemVar) {
            $getterName = 'get'.ucfirst($itemVar);
            $setterName = 'set'.ucfirst($itemVar);

            if(method_exists($shipping, $getterName) && method_exists($item, $setterName)) {
                $elem =  $shipping->{$getterName}();
                $item->{$setterName}($elem);  
            }
        }

        return $item;
    }
}