<?php
namespace Sylapi\Feeds\Seznam\Models;

use Sylapi\Feeds\Seznam\Feed;
use JMS\Serializer\Annotation as Serializer;
use Sylapi\Feeds\Contracts\ProductSerializer;

/**
 * @Serializer\XmlRoot("SHOPITEM")
 * @Serializer\AccessType("public_method")
 */

class Product implements ProductSerializer
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ITEM_ID")
     */
    private $id;
    
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PRODUCT")
     */
    private $title;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DESCRIPTION")
     */
    private $description;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("URL")
     */
    private $link;

    /**
     * @Serializer\Type("string") 
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IMGURL")
     */
    private $imageLink;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("PRICE_VAT")
     */
    private $price;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CATEGORYTEXT")
     */
    private $productCategory;  

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MANUFACTURER")
     */
    private $manufacturer;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("BRAND")
     */
    private $brand;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EAN")
     */
    private $gtin;  

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PRODUCTNO")
     */
    private $mpn;

    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EROTIC")
     */
    private $adult;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ITEMGROUP_ID")
     */
    private $itemGroupId;

    /**
     * @Serializer\Exclude
     */
    private $customLabels;
    
    /**
     * @Serializer\Type("Sylapi\Feeds\Seznam\Models\Shipping")
     * @Serializer\SerializedName("DELIVERY")
     */
    private $shipping;
    
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("DELIVERY_DATE")
     */
    private $maxHandlingTime;  

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(inline = true, entry = "param")
     */
    private $productDetails;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(inline = true, entry = "extra_message")
     */
    private $productHighlights;    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PRODUCTNAME")
     * @return string
     */
    public function getProductName()
    {
        return $this->title;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }    

    /**
     * Get the value of imageLink
     */ 
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * Set the value of imageLink
     *
     * @return  self
     */ 
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;

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
     * Get the value of productCategory
     */ 
    public function getProductCategory()
    {
        if(isset($this->productCategory[Feed::NAME])) {
            return $this->productCategory[Feed::NAME];
        }
        
        return null;
    }

    /**
     * Set the value of productCategory
     *
     * @return  self
     */ 
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;

        return $this;
    }


    /**
     * Get the value of manufacturer
     */ 
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set the value of manufacturer
     *
     * @return  self
     */ 
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of gtin
     */ 
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set the value of gtin
     *
     * @return  self
     */ 
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Get the value of mpn
     */ 
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Set the value of mpn
     *
     * @return  self
     */ 
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Get the value of adult
     */ 
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set the value of adult
     *
     * @return  self
     */ 
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get the value of itemGroupId
     */ 
    public function getItemGroupId()
    {
        return $this->itemGroupId;
    }

    /**
     * Set the value of itemGroupId
     *
     * @return  self
     */ 
    public function setItemGroupId($itemGroupId)
    {
        $this->itemGroupId = $itemGroupId;

        return $this;
    }

    /**
     * Get the value of customLabels
     */ 
    public function getCustomLabels()
    {
        return $this->customLabels;
    }

    /**
     * Set the value of customLabels
     *
     * @return  self
     */ 
    public function setCustomLabels($customLabels)
    {
        $this->customLabels = $customLabels;

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("custom_label_0")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCustomLabel0()
    {
        $lables = $this->getCustomLabels();
        if(!isset($lables[0])) {
            return null;
        }
        return $lables[0];
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("custom_label_1")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCustomLabel1()
    {
        $lables = $this->getCustomLabels();
        if(!isset($lables[1])) {
            return null;
        }
        return $lables[1];
    }
    
    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("custom_label_2")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCustomLabel2()
    {
        $lables = $this->getCustomLabels();
        if(!isset($lables[2])) {
            return null;
        }
        return $lables[2];
    }
    
    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("custom_label_3")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCustomLabel3()
    {
        $lables = $this->getCustomLabels();
        if(!isset($lables[3])) {
            return null;
        }
        return $lables[3];
    }
    
    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("custom_label_4")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCustomLabel4()
    {
        $lables = $this->getCustomLabels();
        if(!isset($lables[4])) {
            return null;
        }
        return $lables[4];
    } 

    /**
     * Get the value of shipping
     */ 
    public function getShipping()
    {
        return $this->shipping;
    }


    /**
     * Set the value of shipping
     *
     * @return  self
     */ 
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get the value of maxHandlingTime
     */ 
    public function getMaxHandlingTime()
    {
        return $this->maxHandlingTime;
    }

    /**
     * Set the value of maxHandlingTime
     *
     * @return  self
     */ 
    public function setMaxHandlingTime($maxHandlingTime)
    {
        $this->maxHandlingTime = $maxHandlingTime;

        return $this;
    }

    /**
     * Get the value of productDetails
     */ 
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Set the value of productDetails
     *
     * @return  self
     */ 
    public function setProductDetails($productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    } 

    /**
     * Get the value of productHighlights
     */ 
    public function getProductHighlights()
    {
        return $this->productHighlights;
    }

    /**
     * Set the value of productHighlights
     *
     * @return  self
     */ 
    public function setProductHighlights($productHighlights)
    {
        $this->productHighlights = $productHighlights;

        return $this;
    }

    public function make(\Sylapi\Feeds\Models\Product $product): self
    {
        $item  = new self;

        $itemVars = array_keys(get_class_vars(self::class));
    
        foreach($itemVars as $itemVar) {
            $getterName = 'get'.ucfirst($itemVar);
            $setterName = 'set'.ucfirst($itemVar);

            if(method_exists($product, $getterName) && method_exists($item, $setterName)) {
                $elem =  $product->{$getterName}();
                if(is_object($elem)) {
                    switch(get_class($elem)) {
                        case 'Sylapi\Feeds\Models\Shipping' :
                            $elem = (new Shipping)->make($elem);
                        break;                      
                    }
                }
                if(is_array($elem) && $itemVar === 'productDetails') {
                    $elems = [];
                    foreach($elem as $pd){
                        $elems[] = (new ProductDetail)->make($pd);
                    }
                    $elem = $elems;
                }

                $item->{$setterName}($elem);  
            }
        }

        return $item;
    }
}
