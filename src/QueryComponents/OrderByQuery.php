<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

use Henrik\ORM\SqlQueryBuilder\Utils\OrderBy;

readonly class OrderByQuery implements OrderByQueryInterface
{
    /**
     * @param string[] $fields
     * @param OrderBy  $orderBy
     */
    public function __construct(private array $fields, private OrderBy $orderBy = OrderBy::ASC) {}

    public function getQueryLine(): string
    {
        return sprintf('ORDER BY %s %s ', implode(',', $this->fields), $this->orderBy->value);
    }

    public function getOrderForQueryBuilder(): int
    {
        return 8;
    }
}