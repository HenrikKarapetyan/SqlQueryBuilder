<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\AddColumnQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\AddIndexQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\AlterQueryInterface;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\ChangeColumnType;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\DropColumnQuery;
use Henrik\ORM\SqlQueryBuilder\Queries\AlterQuery\RenameColumnQuery;

class ModifyQueryBuilder extends BaseQueryBuilder
{
    public function __construct(private readonly string $table) {}

    /**
     * @param string   $index
     * @param string[] $columns
     *
     * @return AlterQueryInterface
     */
    public function addIndex(string $index, array $columns): AlterQueryInterface
    {
        $addIndexQuery = new AddIndexQuery($this->table, $index, $columns);
        $this->addQueryPart($addIndexQuery);

        return $addIndexQuery;
    }

    public function renameColumn(string $columnName, string $newColumnName): AlterQueryInterface
    {
        $renameColumnQuery = new RenameColumnQuery($this->table, $columnName, $newColumnName);
        $this->addQueryPart($renameColumnQuery);

        return $renameColumnQuery;
    }

    public function addColumn(string $columnName, string $columnType): AlterQueryInterface
    {
        $addColumnQuery = new AddColumnQuery($this->table, $columnName, $columnType);
        $this->addQueryPart($addColumnQuery);

        return $addColumnQuery;
    }

    public function changeColumnType(string $columnName, string $columnType): AlterQueryInterface
    {
        $changeColumnType = new ChangeColumnType($this->table, $columnName, $columnType);
        $this->addQueryPart($changeColumnType);

        return $changeColumnType;
    }

    public function dropColumn(string $columnName): AlterQueryInterface
    {
        $dropColumnQuery = new DropColumnQuery($this->table, $columnName);
        $this->addQueryPart($dropColumnQuery);

        return $dropColumnQuery;
    }
}