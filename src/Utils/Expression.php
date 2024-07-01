<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

class Expression
{
    public static function like(string $column, string $value): string
    {
        return sprintf(' %s LIKE  %s ', $column, $value);
    }

    public static function equal(string $column, string $value): string
    {
        return sprintf('%s = %s', $column, str_contains(':', $value) ? $value : ValueNormalizer::normalize($value));
    }

    public static function notEqual(string $column, string $value): string
    {
        return sprintf('%s != %s', $column, ValueNormalizer::normalize($value));
    }

    public static function in(string $column, array $values): string
    {
        array_map(function (&$value) {
            $value = ValueNormalizer::normalize($value);
        }, $values);

        return sprintf('%s IN (%s)', $column, implode(', ', $values));
    }

    public static function notIn(string $column, array $values): string
    {
        array_map(function (&$value) {
            $value = ValueNormalizer::normalize($value);
        }, $values);

        return sprintf('%s NOT IN (%s)', $column, implode(', ', $values));
    }
}