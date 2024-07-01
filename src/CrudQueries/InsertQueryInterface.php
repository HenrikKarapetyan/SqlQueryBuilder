<?php

namespace Henrik\ORM\SqlQueryBuilder\CrudQueries;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQueryInterface;
use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface InsertQueryInterface extends QueryInterface, OrderByQueryInterface {}