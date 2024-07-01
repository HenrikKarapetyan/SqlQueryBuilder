<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\Queries\BaseOrderedQuery;

class CreateIndexQuery extends BaseOrderedQuery implements CreateIndexQueryInterface
{
    /**
     * @param string   $table
     * @param string   $indexName
     * @param string[] $columns
     */
    public function __construct(
        private string $table,
        private string $indexName,
        private array $columns
    ) {}

    public function getQueryLine(): string
    {
        return sprintf('CREATE INDEX %s ON %s (%s)', $this->indexName, $this->table, implode(', ', $this->columns));
    }
}