<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

abstract class AlterQuery implements AlterQueryInterface
{

    public function __construct(private readonly string $table){}

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('ALTER TABLE "%s" %s', $this->table, $this->getQueryPart());
    }
}