<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

use Henrik\ORM\SqlQueryBuilder\Utils\JoinTypes;

class JoinQuery implements JoinQueryInterface
{
    public function __construct(
        private readonly string $table,
        private readonly JoinTypes $joinType,
        private readonly string $condition,
        private ?string $alias = null
    ) {
        if (!$this->alias) {
            $this->alias = $this->table;
        }
    }

    public function getOrderForQueryBuilder(): int
    {
        return 1;
    }

    public function getQueryLine(): string
    {
        return sprintf(
            ' %s JOIN %s AS %s ON %s ',
            $this->joinType->value,
            $this->table,
            $this->alias,
            $this->condition
        );
    }
}