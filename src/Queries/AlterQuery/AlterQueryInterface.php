<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface AlterQueryInterface extends QueryInterface, OrderByQueryInterface
{

    /**
     * @return string
     */
    public function getQueryPart(): string;
}