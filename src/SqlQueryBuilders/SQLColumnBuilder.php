<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Utils\SQLDataTypes;

class SQLColumnBuilder
{
    /**
     * @var string[]
     */
    private array $columns = [];

    public function asInteger(string $name): self
    {
        $this->columns[] = sprintf('%s %s', $name, SQLDataTypes::INT->value);

        return $this;
    }

    public function asSmallInteger(string $name): self
    {
        $this->columns[] = sprintf('%s %s', $name, SQLDataTypes::SMALLINT->value);

        return $this;
    }

    public function asBigInteger(string $name): self
    {
        $this->columns[] = sprintf('%s %s', $name, SQLDataTypes::BIGINT->value);

        return $this;
    }

    public function asString(string $name, int $length = 255): self
    {
        $this->columns[] = sprintf('%s %s(%d)', $name, SQLDataTypes::VARCHAR->value, $length);

        return $this;
    }

    public function asText(string $name, int $length = 65535): self
    {
        $this->columns[] = sprintf('%s %s(%d)', $name, SQLDataTypes::TEXT->value, $length);

        return $this;
    }

    public function primaryKey(string $name): self
    {
        $this->columns[] = sprintf('PRIMARY KEY (%s)', $name);

        return $this;
    }

    /**
     * @return string[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }
}