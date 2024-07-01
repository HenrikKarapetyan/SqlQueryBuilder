<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class DropDatabaseQuery extends BaseOrderedQuery implements DropDatabaseQueryInterface
{

    public function __construct(private readonly string $database)
    {
    }

    public function getQueryLine(): string
    {
        return sprintf('DROP DATABASE IF EXISTS %s', $this->database);
    }
}