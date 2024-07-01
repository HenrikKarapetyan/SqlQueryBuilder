<?php

namespace Henrik\ORM\SqlQueryBuilder\CrudQueries;

class DeleteQuery implements DeleteQueryInterface
{
    public function __construct(private string $table) {}

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('DELETE FROM "%s" ', $this->table);
    }
}