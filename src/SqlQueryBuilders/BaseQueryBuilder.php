<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

use Henrik\ORM\SqlQueryBuilder\QueryComponents\QueryComponentInterface;

abstract class BaseQueryBuilder implements SqlQueryBuilderInterface
{
    /** @var array<string, scalar> */
    private array $queryParams = [];

    /**
     * @var array<QueryComponentInterface>
     */
    private array $queryParts = [];

    /**
     * {@inheritDoc}
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * {@inheritDoc}
     */
    public function addParameter(string $name, bool|float|int|string $value): self
    {
        $this->queryParams[':' . ltrim($name, ':')] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuery(): string
    {
        $queryLine = '';

        $this->sortQueryParts();

        foreach ($this->getQueryParts() as $part) {
            $queryLine .= $part->getQueryLine();
        }

        return rtrim($queryLine, ',;');
    }

    /**
     * @return QueryComponentInterface[]
     */
    protected function getQueryParts(): array
    {
        return $this->queryParts;
    }

    protected function addQueryPart(QueryComponentInterface $query): self
    {
        $this->queryParts[] = $query;

        return $this;
    }

    private function sortQueryParts(): void
    {
        usort(
            $this->queryParts,
            function (QueryComponentInterface $component1, QueryComponentInterface $component2) {
                return $component1->getOrderForQueryBuilder() > $component2->getOrderForQueryBuilder();
            }
        );

    }
}