<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class UpdateQuery extends BaseOrderedQuery implements UpdateQueryInterface
{
    /**
     * @param string[] $fields
     * @param string   $table
     */
    public function __construct(
        private string $table,
        private array $fields = [],
    ) {}

    /**
     * {@inheritDoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * {@inheritDoc}
     */
    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * {@inheritDoc}
     */
    public function setTable(string $table): self
    {
        $this->table = $table;

        return $this;
    }

    public function getQueryLine(): string
    {
        return sprintf(
            'UPDATE "%s" SET %s ',
            $this->getTable(),
            implode(', ', $this->getFields())
        );
    }
}