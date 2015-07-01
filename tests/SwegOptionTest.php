<?php

namespace SOLID
{
    class SwegOptionTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var SwegOption
         */
        private $option;
        private $price = 123;
        private $type = 'Lel';

        protected function setUp()
        {
            $this->option = new SwegOption($this->price, new CompatibleOptionsCollection());
        }

        public function testGetOptionPriceWorks()
        {
            $this->assertSame($this->price, $this->option->getPrice());
        }
    }
}
