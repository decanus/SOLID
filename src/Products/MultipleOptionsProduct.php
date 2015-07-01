<?php

namespace SOLID
{
    class MultipleOptionsProduct implements Product
    {
        /**
         * @var int
         */
        private $price;

        /**
         * @var Option[]
         */
        private $options = [];

        /**
         * @var CompatibleOptionsCollection
         */
        private $compatibleOptionsCollection;

        /**
         * @param                             $price
         * @param CompatibleOptionsCollection $compatibleOptionsCollection
         * @param Option                      $option
         */
        public function __construct($price, CompatibleOptionsCollection $compatibleOptionsCollection, Option $option)
        {
            $this->compatibleOptionsCollection = $compatibleOptionsCollection;
            $this->addOption($option);
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
            $price = $this->getBasePrice();
            foreach ($this->options as $option) {
                $price += $option->getPrice();
            }

            return $price;
        }

        /**
         * @param Option $option
         *
         * @throws \InvalidArgumentException
         */
        public function addOption(Option $option)
        {
            $this->ensureNoMoreThanThreeOptionsArePresent();
            $this->ensureOptionCompatibility($option);
            $this->options[] = $option;
        }

        /**
         * @throws \OutOfBoundsException
         */
        private function ensureNoMoreThanThreeOptionsArePresent()
        {
            if (count($this->options) === 3) {
                throw new \OutOfBoundsException('Option limit has been met!');
            }
        }

        /**
         * @param Option $option
         *
         * @throws \InvalidArgumentException
         */
        private function ensureOptionCompatibility(Option $option)
        {
            if ($this->isInCompatibleWithProduct($option)) {
                throw new \InvalidArgumentException('NONONO');
            }

            if ($this->isInCompatibleWithSelectedOptions($option)) {
                throw new \InvalidArgumentException('NONONO');
            }
        }

        /**
         * @param Option $option
         *
         * @return bool
         */
        private function isInCompatibleWithSelectedOptions(Option $option)
        {
            foreach ($this->options as $selectedOption) {
                if ($selectedOption->isInCompatibleWithOption($option)) {
                        return true;
                }
            }

            return false;
        }

        /**
         * @param Option $option
         *
         * @return bool
         */
        private function isInCompatibleWithProduct(Option $option)
        {
            return !$this->compatibleOptionsCollection->has($option);
        }
    }
}
