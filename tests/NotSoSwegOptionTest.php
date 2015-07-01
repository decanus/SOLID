<?php

namespace SOLID
{
    class NotSoSwegOptionTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var NotSoSwegOption
         */
        private $option;
        private $price = 123;
        private $compatibleOptionsCollection;

        protected function setUp()
        {
            $this->compatibleOptionsCollection = new CompatibleOptionsCollection();
            $this->option = new NotSoSwegOption($this->price, $this->compatibleOptionsCollection);
        }

        public function testGetOptionPriceWorks()
        {
            $this->assertSame($this->price, $this->option->getPrice());
        }
    }
}
