<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

readonly class GroupByQuery implements GroupByQueryInterface
{
    /**
     * @param string[] $columns
     */
    public function __construct(private array $columns) {}

    public function getOrderForQueryBuilder(): int
    {
        return 4;
    }

    public function getQueryLine(): string
    {
        return sprintf(' GROUP BY (%s) ', implode(',', $this->columns));
    }
}