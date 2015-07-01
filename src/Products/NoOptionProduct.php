<?php

namespace SOLID
{
    class NoOptionProduct implements Product
    {
        /**
         * @var int
         */
        private $price;

        /**
         * @param int $price
         */
        public function __construct($price)
        {
            $this->price = $price;
        }

        /**
         * @return int
         */
        public function getBasePrice()
        {
            return $this->price;
        }

        /**
         * @return int
         */
        public function getTotalPrice()
        {
            return $this->price;
        }
    }
}
