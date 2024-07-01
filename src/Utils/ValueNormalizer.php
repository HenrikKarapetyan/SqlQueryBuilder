<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

use Henrik\ORM\Exception\UnsupportedTypeException;

class ValueNormalizer
{
    /**
     * @param mixed $value
     *
     * @throws UnsupportedTypeException
     *
     * @return scalar
     */
    public static function normalize(mixed $value): bool|float|int|string
    {
        switch ($value) {
            case is_bool($value):
            case is_numeric($value): $normalizedValue = $value;

                break;

            case is_string($value):
                $normalizedValue = self::addQuotes($value);

                break;

            default:throw new UnsupportedTypeException('Unsupported type: ' . gettype($value));

        }

        return $normalizedValue;
    }

    private static function addQuotes(string $str): string
    {
        return "'{$str}'";
    }
}