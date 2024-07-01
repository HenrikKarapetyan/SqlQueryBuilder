<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;
use Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders\SQLColumnBuilder;

interface CreateTableQueryInterface  extends QueryInterface, OrderByQueryInterface {
    /**
     * @return SQLColumnBuilder
     */
    public function addColumns(): SQLColumnBuilder;

}