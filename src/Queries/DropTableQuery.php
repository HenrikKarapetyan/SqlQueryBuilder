<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class DropTableQuery implements DropTableQueryInterface
{

    public function __construct(private string $table)
    {
    }

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('DROP TABLE IF EXISTS "%s"', $this->table);
    }
}