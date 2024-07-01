<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

enum JoinTypes: string
{
    case LEFT  = 'LEFT';
    case RIGHT = 'RIGHT';
    case INNER = 'INNER';
    case OUTER = 'OUTER';
    case FULL  = 'FULL';
    case SELF  = 'SELF';
}