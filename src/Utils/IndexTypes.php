<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

enum IndexTypes: string
{
    case FULLTEXT = 'FULLTEXT';
    case BTREE    = 'BTREE';
    case HASH     = 'HASH';
}