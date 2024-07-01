<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class DropTableQuery extends BaseOrderedQuery implements DropTableQueryInterface
{

    public function __construct(private readonly string $table)
    {
    }


    public function getQueryLine(): string
    {
        return sprintf('DROP TABLE IF EXISTS "%s"', $this->table);
    }
}