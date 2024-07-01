<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

readonly class RawValueSetQuery implements QueryComponentInterface
{
    public function __construct(private string $column, private string $value) {}

    public function getOrderForQueryBuilder(): int
    {
        return 1;
    }

    public function getQueryLine(): string
    {
        return sprintf('%s = %s', $this->column, $this->value);
    }
}