<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

class HavingQuery implements HavingQueryInterface
{
    /**
     * @param string[] $conditions
     */
    public function __construct(private readonly array $conditions) {}

    public function getOrderForQueryBuilder(): int
    {
        return 5;
    }

    public function getQueryLine(): string
    {
        return sprintf(' HAVING %s ', implode(' AND ', $this->conditions));
    }
}