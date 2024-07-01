<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\Queries\BaseOrderedQuery;
use Henrik\ORM\SqlQueryBuilder\Utils\IndexTypes;

class CreateIndexQuery extends BaseOrderedQuery implements CreateIndexQueryInterface
{
    public function __construct(private string $table, private string $indexName, private array $columns, private ?IndexTypes $indexType = null) {}

    public function getQueryLine(): string
    {
        return sprintf('CREATE INDEX %s ON %s (%s)', $this->indexName, $this->table, implode(', ', $this->columns));
    }
}