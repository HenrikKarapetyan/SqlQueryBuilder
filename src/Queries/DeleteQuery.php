<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class DeleteQuery extends BaseOrderedQuery implements DeleteQueryInterface
{
    public function __construct(private string $table) {}

    public function getQueryLine(): string
    {
        return sprintf('DELETE FROM "%s" ', $this->table);
    }
}