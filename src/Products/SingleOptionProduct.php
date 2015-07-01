<?php

namespace SOLID
{
    class SingleOptionProduct implements Product
    {
        /**
         * @var int
         */
        private $price;

        /**
         * @var Option
         */
        private $option;

        /**
         * @param int    $price
         * @param Option $option
         */
        public function __construct($price, Option $option = null)
        {
            $this->option = $option;
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
            return $this->getBasePrice() + $this->getOptionPrice();
        }

        /**
         * @return int
         */
        private function getOptionPrice()
        {
            if ($this->option === null) {
                return 0;
            }

            return $this->option->getPrice();
        }
    }
}
