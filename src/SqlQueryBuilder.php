<?php

namespace Henrik\ORM\SqlQueryBuilder;

use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\BaseQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\CreateQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\DeleteQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\DropQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\ExistsQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\InsertSqlQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\ModifyQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\SelectSqlQueryBuilder;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\UpdateSqlQueryBuilder;

class SqlQueryBuilder implements QueryBuilderInterface
{
    /**
     * @var BaseQueryBuilder[]
     */
    private array $queries = [];

    /**
     * @param array<string> $columns
     * @param string|null   $from
     * @param string        $alias
     *
     * @return SelectSqlQueryBuilder
     */
    public function select(array $columns = [], ?string $from = null, string $alias = '0'): SelectSqlQueryBuilder
    {
        $selectSqlQueryBuilder = new SelectSqlQueryBuilder($alias, $columns, $from);
        $this->queries[]       = $selectSqlQueryBuilder;

        return $selectSqlQueryBuilder;
    }

    /**
     * @param string[] $fields
     * @param string   $table
     *
     * @return UpdateSqlQueryBuilder
     */
    public function update(array $fields, string $table): UpdateSqlQueryBuilder
    {
        $updateSqlQueryBuilder = new UpdateSqlQueryBuilder($table, $fields);
        $this->queries[]       = $updateSqlQueryBuilder;

        return $updateSqlQueryBuilder;
    }

    public function delete(string $table): DeleteQueryBuilder
    {
        $deleteQueryBuilder = new DeleteQueryBuilder($table);
        $this->queries[]    = $deleteQueryBuilder;

        return $deleteQueryBuilder;
    }

    /**
     * @param string[] $columns
     * @param string   $table
     *
     * @return InsertSqlQueryBuilder
     */
    public function insert(array $columns, string $table): InsertSqlQueryBuilder
    {
        $insertSqlQueryBuilder = new InsertSqlQueryBuilder($table, $columns);
        $this->queries[]       = $insertSqlQueryBuilder;

        return $insertSqlQueryBuilder;
    }

    public function create(): CreateQueryBuilder
    {
        $createQueryBuilder = new CreateQueryBuilder();
        $this->queries[]    = $createQueryBuilder;

        return $createQueryBuilder;
    }

    public function exists(): ExistsQueryBuilder
    {
        $existsQueryBuilder = new ExistsQueryBuilder();
        $this->queries[]    = $existsQueryBuilder;

        return $existsQueryBuilder;
    }

    public function modify(string $table): ModifyQueryBuilder
    {
        $modifyQueryBuilder = new ModifyQueryBuilder($table);
        $this->queries[]    = $modifyQueryBuilder;

        return $modifyQueryBuilder;
    }

    public function drop(): DropQueryBuilder
    {
        $dropQueryBuilder = new DropQueryBuilder();
        $this->queries[]  = $dropQueryBuilder;

        return $dropQueryBuilder;
    }

    public function getSqlQuery(): string
    {
        $queriesLineArray = [];

        foreach ($this->queries as $query) {
            $queriesLineArray[] = $query->getQuery();
        }

        return implode('; ', $queriesLineArray);
    }
}