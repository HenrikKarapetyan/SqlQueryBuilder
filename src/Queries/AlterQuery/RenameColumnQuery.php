<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

class RenameColumnQuery extends AlterQuery
{
    public function __construct(string $table, private readonly string $oldColumnName, private readonly string $newColumnName)
    {
        parent::__construct($table);
    }

    public function getQueryPart(): string
    {
        return sprintf('RENAME COLUMN %s to %s', $this->oldColumnName, $this->newColumnName);
    }
}