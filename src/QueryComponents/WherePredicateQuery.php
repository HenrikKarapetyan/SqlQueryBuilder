<?php

namespace Henrik\ORM\SqlQueryBuilder\QueryComponents;

class WherePredicateQuery implements WherePredicateQueryInterface
{
    private string $queryLine = '';

    /**
     * @param array<string> $conditions
     */
    public function __construct(private readonly array $conditions = []) {}

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public function getQueryLine(): string
    {

        foreach ($this->getConditions() as $condition) {

            $this->addConditionLine($condition);
        }

        return sprintf('WHERE %s', $this->queryLine);
    }

    public function addConditions(array $conditions): self
    {
        foreach ($conditions as $condition) {

            $this->addConditionLine($condition);
        }

        return $this;
    }

    public function getOrderForQueryBuilder(): int
    {
        return 2;
    }

    private function addConditionLine(string $condition): void
    {
        $conditionLine = $condition;

        if ($this->queryLine != '') {
            $conditionLine = sprintf(' AND %s', $condition);
        }
        $this->queryLine .= $conditionLine;
    }
}