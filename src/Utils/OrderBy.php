<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

enum OrderBy: string
{
    case ASC  = 'ASC';
    case DESC = 'DESC';
}