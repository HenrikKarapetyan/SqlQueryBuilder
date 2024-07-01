<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

interface WherePredicateQueryInterface extends QueryComponentInterface
{
    /**
     * @return array<string>
     */
    public function getConditions(): array;

    /**
     * @param array<string> $conditions
     *
     * @return self
     */
    public function addConditions(array $conditions): self;
}