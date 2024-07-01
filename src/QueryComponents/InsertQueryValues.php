<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

use Henrik\ORM\SqlQueryBuilder\Utils\ValueNormalizer;

readonly class InsertQueryValues implements QueryComponentInterface
{
    /**
     * @param array<mixed> $values
     */
    public function __construct(private array $values) {}

    public function getOrderForQueryBuilder(): int
    {
        return 1;
    }

    public function getQueryLine(): string
    {
        foreach ($this->values as &$value) {
            $value = ValueNormalizer::normalize($value);
        }

        return sprintf('(%s),', implode(', ', $this->values));
    }
}