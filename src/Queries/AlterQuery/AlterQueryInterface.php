<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface AlterQueryInterface extends QueryInterface, OrderByQueryInterface
{

    /**
     * @return string
     */
    public function getQueryPart(): string;
}