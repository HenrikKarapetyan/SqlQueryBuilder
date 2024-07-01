<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery;

use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface AlterQueryInterface extends QueryInterface
{

    /**
     * @return string
     */
    public function getQueryPart(): string;
}