<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class DropDatabaseQuery implements DropDatabaseQueryInterface
{

    public function __construct(private string $database)
    {
    }

    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }

    public function getQueryLine(): string
    {
        return sprintf('DROP DATABASE IF EXISTS "%s"', $this->database);
    }
}