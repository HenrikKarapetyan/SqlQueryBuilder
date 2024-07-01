<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

class DropColumnQuery extends AlterQuery
{

    public function __construct(string $table, private string $column)
    {
        parent::__construct($table);
    }

    public function getQueryPart(): string
    {
        return sprintf('DROP COLUMN %s', $this->column);
    }
}