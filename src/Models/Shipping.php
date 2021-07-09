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
     * @Serializer\Type("double")
     * @Serializer\SerializedName("delivery_price")
     */
    private $price;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("delivery_price_cod")
     */
    private $priceCod;    

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("delivery_id")
     */
    private $courier;

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

    /**
     * Get the value of courier
     */ 
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * Set the value of courier
     *
     * @return  self
     */ 
    public function setCourier($courier)
    {
        $this->courier = $courier;

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