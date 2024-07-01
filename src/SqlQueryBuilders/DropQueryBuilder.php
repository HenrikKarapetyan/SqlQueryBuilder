<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\DropDatabaseQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\DropTableQuery;
use Henrik\ORM\SqlQueryBuilder\Traits\WherePredicateTrait;

class DropQueryBuilder extends BaseQueryBuilder
{
    use WherePredicateTrait;

    public function __construct() {}

    public function table(string $table): void
    {
        $this->addQueryPart(new DropTableQuery($table));
    }

    public function database(string $database): void
    {
        $this->addQueryPart(new DropDatabaseQuery($database));
    }
}