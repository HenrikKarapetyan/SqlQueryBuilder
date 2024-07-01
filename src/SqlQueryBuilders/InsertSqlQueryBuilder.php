<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\CrudQueries\InsertQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\InsertQueryValues;

class InsertSqlQueryBuilder extends BaseQueryBuilder
{
    /**
     * @param string[] $columns
     * @param string   $table
     */
    public function __construct(string $table, array $columns)
    {
        $this->addQueryPart(new InsertQuery($table, $columns));
    }

    /**
     * @param array<mixed> $values
     *
     * @return $this
     */
    public function addValues(array $values): self
    {

        $this->addQueryPart(new InsertQueryValues($values));

        return $this;
    }
}