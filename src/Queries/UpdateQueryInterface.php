<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface UpdateQueryInterface extends QueryInterface, OrderByQueryInterface
{
    /**
     * @return string[]
     */
    public function getFields(): array;

    /**
     * @param string[] $fields
     */
    public function setFields(array $fields): self;

    /**
     * @return string
     */
    public function getTable(): string;

    /**
     * @param string $table
     *
     * @return self
     */
    public function setTable(string $table): self;
}