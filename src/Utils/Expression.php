<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

use Henrik\ORM\SqlQueryBuilder\Exception\UnsupportedTypeException;

class Expression
{
    public static function like(string $column, string $value): string
    {
        return sprintf(' %s LIKE  %s ', $column, $value);
    }

    /**
     * @param string $column
     * @param scalar $value
     *
     * @return string
     */
    public static function equal(string $column, mixed $value): string
    {
        return sprintf('%s = %s', $column, $value);
    }

    public static function notEqual(string $column, string $value): string
    {
        return sprintf('%s != %s', $column, ValueNormalizer::normalize($value));
    }

    /**
     * @param string       $column
     * @param array<mixed> $values
     *
     * @throws UnsupportedTypeException
     *
     * @SuppressWarnings(PHPMD.ShortMethodName)
     *
     * @return string
     */
    public static function in(string $column, array $values): string
    {
        array_map(function (&$value) {
            $value = ValueNormalizer::normalize($value);
        }, $values);

        return sprintf('%s IN (%s)', $column, implode(', ', $values));
    }

    /**
     * @param string       $column
     * @param array<mixed> $values
     *
     * @throws UnsupportedTypeException
     *
     * @return string
     */
    public static function notIn(string $column, array $values): string
    {
        array_map(function (&$value) {
            $value = ValueNormalizer::normalize($value);
        }, $values);

        return sprintf('%s NOT IN (%s)', $column, implode(', ', $values));
    }
}