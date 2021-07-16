<?php
namespace Sylapi\Feeds\Seznam\Models;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("delivery")
 * @Serializer\AccessType("public_method")
 */
class Shipping
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DELIVERY_ID")
     */
    private $service;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("DELIVERY_PRICE")
     */
    private $price;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("DELIVERY_PRICE_COD")
     */
    private $priceCod;

    /**
     * Get the value of service
     */ 
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of priceCod
     */ 
    public function getPriceCod()
    {
        return $this->priceCod;
    }

    /**
     * Set the value of priceCod
     *
     * @return  self
     */ 
    public function setPriceCod($priceCod)
    {
        $this->priceCod = $priceCod;

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