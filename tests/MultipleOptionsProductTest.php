<?php

namespace SOLID
{
    class MultipleOptionsProductTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var MultipleOptionsProduct
         */
        private $product;
        private $price = 123;
        private $compatibleOptionsCollection;

        /**
         * @var Option
         */
        private $initialOption;

        protected function setUp()
        {
            $this->compatibleOptionsCollection = new CompatibleOptionsCollection();
            $this->initialOption = new SwegOption(2, $this->compatibleOptionsCollection);
            $this->compatibleOptionsCollection->add(new SwegOption(123, $this->compatibleOptionsCollection));
            $this->product = new MultipleOptionsProduct($this->price, $this->compatibleOptionsCollection, $this->initialOption);
        }

        /**
         * @expectedException \InvalidArgumentException
         */
        public function testIncompatibleOptionThrowsException()
        {
            $this->product->addOption(new NotSoSwegOption(123, $this->compatibleOptionsCollection));
        }

        public function testBasePriceCanBeRetrieved()
        {
            $this->assertSame($this->price, $this->product->getBasePrice());
        }

        public function testCalculatesTotalPriceWithOptions()
        {
            $option = new SwegOption(123, $this->compatibleOptionsCollection);
            $this->product->addOption($option);
            $price = $this->product->getBasePrice() + $option->getPrice() + $this->initialOption->getPrice();
            $this->assertSame($price, $this->product->getTotalPrice());
        }

        public function testThreeOptionsCanBeAdded()
        {
            $this->product->addOption(new SwegOption(1, $this->compatibleOptionsCollection));
            $this->product->addOption(new SwegOption(2, $this->compatibleOptionsCollection));

            $price = $this->product->getBasePrice() + 3 + $this->initialOption->getPrice();
            $this->assertSame($price, $this->product->getTotalPrice());
            return $this->product;
        }

        /**
         * @expectedException \InvalidArgumentException
         */
        public function testExceptionIsThrowWhenOptionIsIncompatibleWithSelectedOptions()
        {
            $this->compatibleOptionsCollection->add(new NotSoSwegOption(123, $this->compatibleOptionsCollection));
            $collection = new CompatibleOptionsCollection();
            $collection->add(new SwegOption(123, $this->compatibleOptionsCollection));
            $sweg = new SwegOption(123, $collection);
            $this->product->addOption($sweg);
            $this->product->addOption(new NotSoSwegOption(123, $this->compatibleOptionsCollection));
        }

        /**
         * @depends testThreeOptionsCanBeAdded
         * @expectedException \OutOfBoundsException
         */
        public function testExceptionIsThrownWhenMoreThanThreeOptionsAreAdded(MultipleOptionsProduct $product)
        {
            $product->addOption(new SwegOption(1234, $this->compatibleOptionsCollection));
        }
    }
}
