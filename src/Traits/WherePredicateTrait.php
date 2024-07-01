<?php

namespace Henrik\ORM\SqlQueryBuilder\Traits;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\WherePredicateQuery;
use Henrik\ORM\SqlQueryBuilder\QueryComponents\WherePredicateQueryInterface;

trait WherePredicateTrait
{
    private ?WherePredicateQueryInterface $wherePredicateQuery = null;

    /**
     * @param array<string> $conditions
     *
     * @return $this
     */
    public function where(array $conditions): self
    {
        $this->wherePredicateQuery = new WherePredicateQuery($conditions);
        $this->addQueryPart($this->wherePredicateQuery);

        return $this;
    }

    /**
     * @param array<string> $conditions
     *
     * @return $this
     */
    public function andWhere(array $conditions): self
    {
        if ($this->wherePredicateQuery) {
            $this->wherePredicateQuery->addConditions($conditions);

            return $this;
        }

        $this->wherePredicateQuery = new WherePredicateQuery($conditions);
        $this->addQueryPart($this->wherePredicateQuery);

        return $this;
    }
}