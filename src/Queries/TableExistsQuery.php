<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class TableExistsQuery extends BaseOrderedQuery implements TableExistsQueryInterface
{
    public function __construct(private string $table) {}

    public function getQueryLine(): string
    {
        return sprintf('select 1 from %s', $this->table);
    }
}