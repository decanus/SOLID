<?php

namespace SOLID
{
    class NoOptionProductTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var NoOptionProduct
         */
        private $product;
        private $price = 123;

        protected function setUp()
        {
            $this->product = new NoOptionProduct($this->price);
        }

        public function testBasePriceCanBeRetrieved()
        {
            $this->assertSame($this->price, $this->product->getBasePrice());
        }

        public function testTotalPriceCanBeRetrieved()
        {
            $this->assertSame($this->price, $this->product->getTotalPrice());
        }

    }
}
