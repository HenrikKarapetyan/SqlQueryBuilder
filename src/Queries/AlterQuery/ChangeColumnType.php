<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

class ChangeColumnType extends AlterQuery
{
    public function __construct(string $table, private readonly string $column, private readonly string $type)
    {
        parent::__construct($table);
    }

    public function getQueryPart(): string
    {
        return sprintf('MODIFY %s %s', $this->column, $this->type);
    }
}