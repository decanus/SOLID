<?php

namespace SOLID
{
    class SingleOptionProductTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var SingleOptionProduct
         */
        private $product;
        private $price = 123;

        /**
         * @var Option
         */
        private $initialOption;

        protected function setUp()
        {
            $this->initialOption = new SwegOption(2, new CompatibleOptionsCollection());
            $this->product = new SingleOptionProduct($this->price, $this->initialOption);
        }

        public function testBasePriceCanBeRetrieved()
        {
            $this->assertSame($this->price, $this->product->getBasePrice());
        }

        public function testCalculatesTotalPriceWithOption()
        {

            $price = $this->product->getBasePrice() + $this->initialOption->getPrice();
            $this->assertSame($price, $this->product->getTotalPrice());
        }

        public function testCalculatesTotalPriceWithoutOption()
        {
            $product = new SingleOptionProduct(123);
            $this->assertSame(123, $product->getTotalPrice());
        }
    }
}
