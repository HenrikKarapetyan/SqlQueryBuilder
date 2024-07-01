<?php

namespace Henrik\ORM\SqlQueryBuilder;

interface QueryBuilderInterface
{
    /**
     * @return string
     */
    public function getSqlQuery(): string;
}