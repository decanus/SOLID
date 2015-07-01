<?php

namespace SOLID
{
    abstract class BaseOption implements Option
    {
        /**
         * @var int
         */
        private $price;

        /**
         * @var CompatibleOptionsCollection
         */
        private $compatibleOptionsCollection;

        /**
         * @param                             $price
         * @param CompatibleOptionsCollection $compatibleOptionsCollection
         */
        public function __construct($price, CompatibleOptionsCollection $compatibleOptionsCollection)
        {
            $this->price = $price;
            $this->compatibleOptionsCollection = $compatibleOptionsCollection;
        }

        /**
         * @return int
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param Option $option
         *
         * @return bool
         */
        public function isInCompatibleWithOption(Option $option)
        {
            return !$this->compatibleOptionsCollection->has($option);
        }

        /**
         * @param Option $option
         *
         * @return bool
         */
        public function equals(Option $option)
        {
            return get_class($option) === get_class($this);
        }
    }
}
