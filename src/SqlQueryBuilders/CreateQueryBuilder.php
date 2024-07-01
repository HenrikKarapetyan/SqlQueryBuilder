<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateDatabaseQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateDatabaseQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateIndexQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateIndexQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateTableQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateTableQueryInterface;

class CreateQueryBuilder extends BaseQueryBuilder
{
    public function table(string $table): CreateTableQueryInterface
    {
        $createTableQuery = new CreateTableQuery($table);
        $this->addQueryPart($createTableQuery);

        return $createTableQuery;
    }

    public function database(string $database): CreateDatabaseQueryInterface
    {
        $createDatabaseQuery = new CreateDatabaseQuery($database);
        $this->addQueryPart($createDatabaseQuery);

        return $createDatabaseQuery;
    }

    /**
     * @param string   $table
     * @param string   $indexName
     * @param string[] $columns
     *
     * @return CreateIndexQueryInterface
     */
    public function index(string $table, string $indexName, array $columns): CreateIndexQueryInterface
    {

        $createIndexQuery = new CreateIndexQuery($table, $indexName, $columns);
        $this->addQueryPart($createIndexQuery);

        return $createIndexQuery;
    }
}