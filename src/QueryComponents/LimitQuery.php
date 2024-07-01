<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

class LimitQuery implements LimitQueryInterface
{
    public function __construct(private ?int $limit = null) {}

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function getQueryLine(): string
    {
        if ($this->getLimit()) {
            return sprintf('LIMIT %d', $this->getLimit());
        }

        return '';
    }

    public function getOrderForQueryBuilder(): int
    {
        return 10;
    }
}