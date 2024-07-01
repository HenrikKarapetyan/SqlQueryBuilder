<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\Utils\IndexTypes;

readonly class CreateIndexQuery implements CreateIndexQueryInterface
{


    public function __construct(private string $table, private string $indexName, private array $columns, private ?IndexTypes $indexType = null)
    {
    }

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('CREATE %s INDEX %s ON %s (%s)', $this->indexType ?? $this->indexType->value, $this->indexName, $this->table, implode(', ', $this->columns));
    }
}