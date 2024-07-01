<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\CrudQueries\UpdateQuery;
use Henrik\ORM\SqlQueryBuilder\Traits\WherePredicateTrait;

class UpdateSqlQueryBuilder extends BaseQueryBuilder
{
    use WherePredicateTrait;

    /**
     * @param string   $table
     * @param string[] $fields
     */
    public function __construct(string $table, array $fields)
    {
        $this->addQueryPart(new UpdateQuery($table, $fields));
    }
}