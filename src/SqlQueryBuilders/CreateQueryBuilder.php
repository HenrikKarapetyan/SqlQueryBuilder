<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

class CreateQueryBuilder extends BaseQueryBuilder
{
    private SQLColumnBuilder $columnBuilder;

    public function __construct(private readonly string $table)
    {
        $this->columnBuilder = new SQLColumnBuilder();
    }

    public function table(): SQLColumnBuilder
    {
        return $this->columnBuilder;
    }

    public function getQuery(): string
    {
        return sprintf('CREATE TABLE "%s" (%s)', $this->table, implode(', ', $this->columnBuilder->getColumns()));
    }
}