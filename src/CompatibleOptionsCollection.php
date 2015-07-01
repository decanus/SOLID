<?php

namespace SOLID
{
    class CompatibleOptionsCollection 
    {
        /**
         * @var \SOLID\Option[]
         */
        private $options;

        /**
         * @param Option $option
         */
        public function add(Option $option)
        {
            $this->options[] = $option;
        }

        /**
         * @param Option $option
         *
         * @return bool
         */
        public function has(Option $option)
        {
            foreach ($this->options as $compatibleOption) {
                if ($option->equals($compatibleOption)) {
                    return true;
                }
            }
            return false;
        }
    }
}
