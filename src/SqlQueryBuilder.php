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
    private array $queries;

    public function __construct(
        private readonly string $alias = 'o',
        private readonly string $table = '',
    )
    {

        $this->queries = [];
    }

    /**
     * @param array<string> $columns
     * @param string|null $from
     * @param bool $distinct
     *
     * @return SelectSqlQueryBuilder
     */
    public function select(array $columns = [], bool $distinct = false, ?string $from = null): SelectSqlQueryBuilder
    {
        $selectSqlQueryBuilder = new SelectSqlQueryBuilder($this->alias, $this->table, $columns, $distinct, $from ?? $this->table);
        $this->queries[] = $selectSqlQueryBuilder;
        return $selectSqlQueryBuilder;
    }

    /**
     * @param string[] $fields
     *
     * @return UpdateSqlQueryBuilder
     */
    public function update(array $fields): UpdateSqlQueryBuilder
    {
        $updateSqlQueryBuilder = new UpdateSqlQueryBuilder($this->table, $fields);
        $this->queries[] = $updateSqlQueryBuilder;
        return $updateSqlQueryBuilder;
    }

    public function delete(): DeleteQueryBuilder
    {
        $deleteQueryBuilder = new DeleteQueryBuilder($this->table);
        $this->queries[] = $deleteQueryBuilder;
        return $deleteQueryBuilder;
    }

    /**
     * @param string[] $columns
     *
     * @return InsertSqlQueryBuilder
     */
    public function insert(array $columns): InsertSqlQueryBuilder
    {
        $insertSqlQueryBuilder = new InsertSqlQueryBuilder($this->table, $columns);
        $this->queries[] = $insertSqlQueryBuilder;
        return $insertSqlQueryBuilder;
    }

    public function create(): CreateQueryBuilder
    {
        $createQueryBuilder = new CreateQueryBuilder($this->table);
        $this->queries[] = $createQueryBuilder;
        return $createQueryBuilder;
    }

    public function exists(): ExistsQueryBuilder
    {
        $existsQueryBuilder = new ExistsQueryBuilder($this->table);
        $this->queries[] = $existsQueryBuilder;

        return $existsQueryBuilder;
    }


    public function modify(): ModifyQueryBuilder
    {
        $modifyQueryBuilder = new ModifyQueryBuilder($this->table);
        $this->queries[] = $modifyQueryBuilder;
        return $modifyQueryBuilder;
    }

    public function drop(): DropQueryBuilder
    {
        $dropQueryBuilder = new DropQueryBuilder();
        $this->queries[] = $dropQueryBuilder;
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