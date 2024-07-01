<?php

namespace Henrik\ORM\SqlQueryBuilder;

interface QueryInterface
{
    /**
     * @return string
     */
    public function getQueryLine(): string;
}