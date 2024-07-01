<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class InsertQuery extends BaseOrderedQuery implements InsertQueryInterface
{
    /**
     * @param string   $table
     * @param string[] $columns
     */
    public function __construct(private string $table, private array $columns) {}

    public function getQueryLine(): string
    {
        return sprintf('INSERT INTO %s (%s) VALUES', $this->table, implode(',', $this->columns));
    }
}