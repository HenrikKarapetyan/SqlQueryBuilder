<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;


class AddColumnQuery extends AlterQuery
{

    public function __construct(string $table, private readonly string $column, private readonly string $columnType)
    {
        parent::__construct($table);
    }

    public function getQueryPart(): string
    {
       return sprintf('ADD %s %s', $this->column, $this->columnType);
    }
}