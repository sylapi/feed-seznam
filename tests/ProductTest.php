<?php

namespace Sylapi\Feeds\Seznam\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\FeedGenerator;
use Sylapi\Feeds\Seznam\Feed;
use Sylapi\Feeds\Seznam\Models\Product;
use Sylapi\Feeds\Seznam\Models\Shipping;
use Sylapi\Feeds\Seznam\Models\ProductDetail;

class ProductTest extends PHPUnitTestCase
{

    private $product;

    private $serializer;

    public function setUp():void
    {
        $this->product = $this->createProduct();
        $this->serializer = (new FeedGenerator())->getSerializer();
    }

    private function createProduct(): Product
    {

        $productDetails = [];
        for($x = 0; $x < 4; $x++)  {
            $productDetail = new ProductDetail();
            $productDetail->setAttributeName('param_'.$x)
                ->setAttributeValue('Value '.$x);
    
            $productDetails[] = $productDetail;
        }
        
        $shipping = new Shipping();
        $shipping->setService('DPD_PICKUP')
            ->setPrice(12.22)
            ->setPriceCod(15.55);
    

        $product = new Product();
        
        $product->setId('1234567890')
            ->setTitle('Test title')
            ->setDescription('Test Description')
            ->setLink('http://link.dev/product/1.html')
            ->setImageLink('http://link.dev/storage/1/1.jpg')
            ->setPrice(100.00)
            ->setSalePrice(90.00)
            ->setProductCategory('Elektronika | Mobilní telefony')
            ->setManufacturer('Test Manufacturer')
            ->setBrand('Test Brand')
            ->setGtin('1234567890')
            ->setMpn('0987654321')
            ->setAdult(true)
            ->setItemGroupId('abcde')
            ->setCustomLabels([
                'label 1',
                'label 2',
                'label 3',
                'label 4',
                'label 5'
            ])
            ->setShipping($shipping)
            ->setMaxHandlingTime(12)
            ->setProductDetails($productDetails)
            ->setProductHighlights([
                'message 1',
                'message 2',
                'message 3'
            ])

            ;
        return $product;
    }


    public function testProductXML()
    {
        $content = $this->serializer->serialize($this->product, 'xml');
        $filePath = __DIR__.'/Mock/product.xml';
        
        $this->assertXmlStringEqualsXmlFile($filePath, $content);
    }

    public function testMakeProduct()
    {
        $categoryName = 'Test Category';

        $productBase = new \Sylapi\Feeds\Models\Product();
        $productBase->setProductCategory([
            Feed::NAME => $categoryName
            ])
            ->setShipping(new \Sylapi\Feeds\Models\Shipping())
            ->setProductDetails([
                Feed::NAME => [ new \Sylapi\Feeds\Models\ProductDetail() ]
            ])
        ;
        $product = (new Product)->make($productBase);
        $productDetails = $product->getProductDetails();
        $this->assertInstanceOf(Product::class, $product);
        $this->assertInstanceOf(Shipping::class, $product->getShipping());
        $this->assertInstanceOf(ProductDetail::class, $productDetails[0]);
        $this->assertEquals($categoryName, $product->getProductCategory());

    }
}