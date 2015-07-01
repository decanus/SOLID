<?php

namespace SOLID
{
    /**
     * @covers SOLID\CompatibleOptionsCollection
     * @uses SOLID\BaseOption
     */
    class CompatibleOptionsCollectionTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @var \SOLID\CompatibleOptionsCollection
         */
        private $compatibleOptionsCollection;

        protected function setUp()
        {
             $this->compatibleOptionsCollection = new CompatibleOptionsCollection();
        }

        public function testOptionCanBeAddedToCollection()
        {
            $option = new SwegOption(123, $this->compatibleOptionsCollection);
            $this->compatibleOptionsCollection->add($option);
            $this->assertTrue($this->compatibleOptionsCollection->has($option));
        }
    }
}
