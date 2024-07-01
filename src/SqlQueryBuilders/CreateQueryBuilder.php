<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateDatabaseQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateDatabaseQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateIndexQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateIndexQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateTableQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\Create\CreateTableQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Utils\IndexTypes;

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
     * @param string          $table
     * @param string          $indexName
     * @param string[]        $columns
     * @param IndexTypes|null $indexType
     *
     * @return CreateIndexQueryInterface
     */
    public function index(string $table, string $indexName, array $columns, ?IndexTypes $indexType = null): CreateIndexQueryInterface
    {

        $createIndexQuery = new CreateIndexQuery($table, $indexName, $columns, $indexType);
        $this->addQueryPart($createIndexQuery);

        return $createIndexQuery;
    }
}