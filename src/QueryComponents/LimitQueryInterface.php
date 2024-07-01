<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

interface LimitQueryInterface extends QueryComponentInterface
{
    public function getLimit(): ?int;

    public function setLimit(int $limit): self;
}