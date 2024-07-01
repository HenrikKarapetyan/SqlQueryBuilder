<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;

abstract class BaseOrderedQuery implements OrderByQueryInterface
{
    public function getOrderForQueryBuilder(): int
    {
        return 0;
    }
}