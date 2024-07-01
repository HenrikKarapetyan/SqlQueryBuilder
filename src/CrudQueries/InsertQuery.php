<?php

namespace Henrik\ORM\SqlQueryBuilder\CrudQueries;

readonly class InsertQuery implements InsertQueryInterface
{
    /**
     * @param string   $table
     * @param string[] $columns
     */
    public function __construct(private string $table, private array $columns) {}

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('INSERT INTO "%s" (%s) VALUES', $this->table, implode(',', $this->columns));
    }
}