<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\Queries\BaseOrderedQuery;

class CreateDatabaseQuery extends BaseOrderedQuery implements CreateDatabaseQueryInterface
{

    public function __construct(private readonly string $database)
    {
    }


    public function getQueryLine(): string
    {
        return sprintf('CREATE DATABASE %s', $this->database);
    }
}