<?php

namespace SOLID
{
    interface Option
    {
        /**
         * @return int
         */
        public function getPrice();

        /**
         * @param Option $option
         *
         * @return bool
         */
        public function equals(Option $option);

        /**
         * @param Option $option
         *
         * @return bool
         */
        public function isInCompatibleWithOption(Option $option);

    }
}
