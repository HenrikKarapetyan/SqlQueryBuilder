<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\Queries\SelectQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\GroupByQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\HavingQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\JoinQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\LimitQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\OrderByQuery;
use Henrik\ORM\SqlQueryBuilder\Traits\WherePredicateTrait;
use Henrik\ORM\SqlQueryBuilder\Utils\JoinTypes;
use Henrik\ORM\SqlQueryBuilder\Utils\OrderBy;

class SelectSqlQueryBuilder extends BaseQueryBuilder
{
    use WherePredicateTrait;

    private SelectQuery $selectQuery;

    /**
     * @param string   $alias
     * @param string[] $columns
     * @param string   $from
     */
    public function __construct(string $alias, array $columns, string $from)
    {
        $this->selectQuery = new SelectQuery($alias);
        $this->selectQuery->setFields($columns);
        $this->selectQuery->setFrom($from);
        $this->addQueryPart($this->selectQuery);
    }

    public function distinct(): self
    {
        $this->selectQuery->setDistinct(true);

        return $this;
    }

    public function setMaxResults(int $limit): self
    {

        $this->addQueryPart(new LimitQuery($limit));

        return $this;
    }

    /**
     * @param string[] $columns
     * @param OrderBy  $order
     *
     * @return $this
     */
    public function orderBy(array $columns, OrderBy $order = OrderBy::ASC): self
    {
        $this->addQueryPart(new OrderByQuery($columns, $order));

        return $this;
    }

    /**
     * @param string[] $columns
     *
     * @return $this
     */
    public function groupBy(array $columns): self
    {
        $this->addQueryPart(new GroupByQuery($columns));

        return $this;
    }

    /**
     * @param string[] $conditions
     *
     * @return $this
     */
    public function having(array $conditions): self
    {
        $this->addQueryPart(new HavingQuery($conditions));

        return $this;
    }

    public function join(string $table, string $alias, string $condition, JoinTypes $joinType = JoinTypes::INNER): self
    {
        $this->addQueryPart(new JoinQuery(
            table: $table,
            joinType: $joinType,
            condition: $condition,
            alias: $alias
        ));

        return $this;
    }
}