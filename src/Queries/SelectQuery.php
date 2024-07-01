<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

class SelectQuery implements SelectQueryInterface
{
    /**
     * @var string[]
     */
    private array $fields = [];
    private string $from;
    private bool $distinct = false;

    public function __construct(private string $alias) {}

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
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * {@inheritDoc}
     */
    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isDistinct(): bool
    {
        return $this->distinct;
    }

    /**
     * {@inheritDoc}
     */
    public function setDistinct(bool $distinct): self
    {
        $this->distinct = $distinct;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQueryLine(): string
    {

        $fieldsLine = sprintf('%s.*', $this->alias);

        if (!empty($this->getFields())) {
            $fieldsLine = implode(', ', $this->getFields());
        }

        return sprintf(
            'SELECT %s FROM "%s" AS %s ',
            $this->isDistinct() ? sprintf(' DISTINCT (%s) ', $fieldsLine) : $fieldsLine,
            $this->getFrom(),
            $this->alias
        );
    }

    public function getOrderForQueryBuilder(): int
    {
        return 1;
    }
}