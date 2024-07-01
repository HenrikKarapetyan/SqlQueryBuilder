<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\TableExistsQuery;

class ExistsQueryBuilder extends BaseQueryBuilder
{
    public function __construct(private readonly string $table) {}

    public function table(): void
    {
        $this->addQueryPart(new TableExistsQuery($this->table));
    }
}