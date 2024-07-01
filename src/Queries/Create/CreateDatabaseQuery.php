<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

readonly class CreateDatabaseQuery implements CreateDatabaseQueryInterface
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
        return sprintf('CREATE DATABASE "%s"', $this->database);
    }
}