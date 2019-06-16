<?php

namespace Mbilling\Common\Helper;


class TypeCast
{
    /**
     * @param $value
     * @return bool
     */
    public static function canCastToString($value)
    {
        if (is_scalar($value)) {
            return !is_bool($value) && !is_resource($value);
        } elseif (is_object($value)) {
            return method_exists($value, '__toString');
        }

        return false;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function canCastToEnumString($value)
    {
        if (is_string($value) && $value !== '') {
            return true;
        } elseif (is_object($value)) {
            return method_exists($value, '__toString');
        }

        return false;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function canCastToDateTime($value)
    {
        if ($value instanceof \DateTime) {
            return true;
        } elseif (is_numeric($value)) {
            $value = (float)$value;
            return $value >= 0;
        } elseif (is_string($value)) {
            return $value !== '';
        } elseif (is_object($value)) {
            return method_exists($value, '__toString') && ((string)$value) !== '';
        }

        return false;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function canCastToBoolean($value)
    {
        return (is_numeric($value) || is_bool($value));
    }
}