<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\QueryInterface;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\SQLColumnBuilder;

interface CreateTableQueryInterface extends QueryInterface
{
    /**
     * @return SQLColumnBuilder
     */
    public function addColumns(): SQLColumnBuilder;
}