<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\CrudQueries\DeleteQuery;
use Henrik\ORM\SqlQueryBuilder\Traits\WherePredicateTrait;

class DeleteQueryBuilder extends BaseQueryBuilder
{
    use WherePredicateTrait;

    public function __construct(string $table)
    {
        $this->addQueryPart(new DeleteQuery($table));
    }
}