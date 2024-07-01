<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\TableExistsQuery;

class ExistsQueryBuilder extends BaseQueryBuilder
{
    public function __construct() {}

    public function table(string $table): void
    {
        $this->addQueryPart(new TableExistsQuery($table));
    }
}