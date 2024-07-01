<?php

namespace Henrik\ORM\SqlQueryBuilder;

use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\CreateQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\DeleteQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\ExistsQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\InsertSqlQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\SelectSqlQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\UpdateSqlQueryBuilder;

readonly class SqlQueryBuilder implements QueryBuilderInterface
{
    public function __construct(
        private string $alias = 'o',
        private string $table = '',
    ) {}

    /**
     * @param array<string> $columns
     * @param string|null   $from
     * @param bool          $distinct
     *
     * @return SelectSqlQueryBuilder
     */
    public function select(array $columns = [], bool $distinct = false, ?string $from = null): SelectSqlQueryBuilder
    {
        return new SelectSqlQueryBuilder($this->alias, $this->table, $columns, $distinct, $from ?? $this->table);
    }

    /**
     * @param string[] $fields
     *
     * @return UpdateSqlQueryBuilder
     */
    public function update(array $fields): UpdateSqlQueryBuilder
    {
        return new UpdateSqlQueryBuilder($this->table, $fields);
    }

    public function delete(): DeleteQueryBuilder
    {
        return new DeleteQueryBuilder($this->table);
    }

    /**
     * @param string[] $columns
     *
     * @return InsertSqlQueryBuilder
     */
    public function insert(array $columns): InsertSqlQueryBuilder
    {
        return new InsertSqlQueryBuilder($this->table, $columns);
    }

    public function create(): CreateQueryBuilder
    {
        return new CreateQueryBuilder($this->table);
    }

    public function exists(): ExistsQueryBuilder
    {
        return new ExistsQueryBuilder($this->table);
    }
}