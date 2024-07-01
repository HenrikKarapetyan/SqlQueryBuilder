<?php

namespace Henrik\ORM\SqlQueryBuilder\CrudQueries;

class TableExistsQuery implements TableExistsQueryInterface
{
    public function __construct(private string $table) {}

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('select 1 from `%s`', $this->table);
    }
}