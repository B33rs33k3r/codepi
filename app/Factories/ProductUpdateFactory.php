<?php

namespace App\Factories;

class ProductUpdateFactory
{
    /**
     * Recursive filter.
     *
     * @param array $needleList
     * @param array $haystack
     * @return Void
     */
    public static function filter($needleList, &$haystack)
    {
        $shiftedNeedle = array_shift($needleList);
        $haystack = array_filter(
            $haystack,
            function($item) use ($shiftedNeedle)
            {
                return $shiftedNeedle != $item;
            }
        );

        if (count($needleList) > 0)
            static::filter($needleList, $haystack);

        return;
    }
}
