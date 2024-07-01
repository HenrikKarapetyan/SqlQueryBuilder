<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface DropTableQueryInterface extends QueryInterface, OrderByQueryInterface
{
}