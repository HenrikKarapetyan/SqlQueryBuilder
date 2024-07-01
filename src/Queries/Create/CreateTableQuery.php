<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\SQLColumnBuilder;

class CreateTableQuery implements CreateTableQueryInterface
{
    private SQLColumnBuilder $columnBuilder;

    public function __construct(private string $table)
    {
        $this->columnBuilder = new SQLColumnBuilder();

    }

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('CREATE TABLE "%s" (%s)', $this->table, implode(', ', $this->columnBuilder->getColumns()));

    }

    public function addColumns(): SQLColumnBuilder
    {
        return $this->columnBuilder;
    }
}