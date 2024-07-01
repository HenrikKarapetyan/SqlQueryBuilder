<?php

namespace Henrik\ORM\SqlQueryBuilder\SqlQueryBuilders;

interface SqlQueryBuilderInterface
{
    /**
     * @return array<string, scalar>
     */
    public function getQueryParams(): array;

    /**
     * @param string $name
     * @param scalar $value
     *
     * @return $this
     */
    public function addParameter(string $name, bool|float|int|string $value): self;

    /**
     * @return string
     */
    public function getQuery(): string;
}