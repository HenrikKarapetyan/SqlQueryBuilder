<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\AddIndexQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQueryInterface;

class ModifyQueryBuilder extends BaseQueryBuilder
{

    public function __construct(private string $table)
    {
    }

    /**
     * @param string $index
     * @param string[] $columns
     * @return AlterQueryInterface
     */
    public function addIndex(string $index, array $columns): AlterQueryInterface
    {
        $addIndexQuery = new AddIndexQuery($this->table, $index, $columns);
        $this->addQueryPart($addIndexQuery);
        return $addIndexQuery;
    }
}