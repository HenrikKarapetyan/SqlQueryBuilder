<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

class AddIndexQuery extends AlterQuery
{

    /**
     * @param string $table
     * @param string $index
     * @param string[] $columns
     */
    public function __construct(string $table, private readonly string $index, private readonly array $columns)
    {
        parent::__construct($table);
    }

    public function getQueryPart(): string
    {
        return sprintf('ADD INDEX %s (%s)', $this->index, implode(', ', $this->columns));
    }
}