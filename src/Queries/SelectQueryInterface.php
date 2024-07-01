<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface SelectQueryInterface extends QueryInterface
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
    public function getFrom(): string;

    /**
     * @param string $from
     *
     * @return self
     */
    public function setFrom(string $from): self;

    /**
     * @return bool
     */
    public function isDistinct(): bool;

    /**
     * @param bool $distinct
     *
     * @return self
     */
    public function setDistinct(bool $distinct): self;

    /**
     * @return string
     */
    public function getAlias(): string;

    /**
     * @param string $alias
     *
     * @return self
     */
    public function setAlias(string $alias): self;
}