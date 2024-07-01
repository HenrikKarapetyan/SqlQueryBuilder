<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

use Henrik\ORM\SqlQueryBuilder\QueryInterface;

interface QueryComponentInterface extends QueryInterface
{
    public function getOrderForQueryBuilder(): int;
}