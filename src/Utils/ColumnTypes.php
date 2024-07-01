<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

enum ColumnTypes: string
{
    case INT    = 'int';
    case FLOAT  = 'float';
    case STRING = 'string';
    case BOOL   = 'bool';
    case ARRAY  = 'array';
}