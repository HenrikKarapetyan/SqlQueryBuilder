<?php

namespace Henrik\ORM\SqlQueryBuilder\Queries\Create;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface CreateDatabaseQueryInterface extends QueryInterface, OrderByQueryInterface
{

}