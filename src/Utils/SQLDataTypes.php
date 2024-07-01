<?php

namespace Henrik\ORM\SqlQueryBuilder\Utils;

enum SQLDataTypes: string
{
    // SQL Numeric Data Types

    /**
     * from 1
     * to 0.
     */
    case BIT = 'BIT';

    /**
     * from 0
     * to 255.
     */
    case TINYINT = 'TINYINT';

    /**
     * from -32,768
     * to 32,767.
     */
    case SMALLINT = 'SMALLINT';

    /**
     * from -2,147,483,648
     * to 2,147,483,647.
     */
    case INT = 'INT';

    /**
     * from -9,223,372,036,854,775,808
     * to 9,223,372,036,854,775,807.
     */
    case BIGINT = 'BIGINT';
    /**
     * from -10^38 + 1
     * to 10^38 - 1.
     */
    case DECIMAL = 'DECIMAL';
    /**
     *  from -10^38 + 1
     * to 10^38 - 1.
     */
    case NUMERIC = 'NUMERIC';
    /**
     * from -1.79E+308
     * to 1.79E+308.
     */
    case FLOAT = 'FLOAT';
    /**
     * from -3.40E+38
     * 	to 3.40E+38.
     */
    case REAL = 'REAL';

    // SQL Date and Time Data Types

    /**
     * Stores date in the format YYYY-MM-DD.
     */
    case DATE = 'DATE';
    /**
     * Stores time in the format HH:MI:SS.
     */
    case TIME = 'TIME';

    /**
     * Stores date and time information in the format YYYY-MM-DD HH:MI:SS.
     */
    case DATETIME = 'DATETIME';
    /**
     * Stores number of seconds passed since the Unix epoch ('1970-01-01 00:00:00' UTC).
     */
    case TIMESTAMP = 'TIMESTAMP';
    /**
     * Stores year in a 2-digit or 4-digit format. Range 1901 to 2155 in 4-digit format. Range 70 to 69, representing 1970 to 2069.
     */
    case YEAR = 'YEAR';

    // SQL Character and String Data Types

    /**
     * Fixed length with a maximum length of 8,000 characters.
     */
    case CHAR = 'CHAR';
    /**
     * Variable-length storage with a maximum length of 8,000 characters.
     */
    case VARCHAR = 'VARCHAR';
    /**
     * Variable-length storage with a maximum size of 2GB data.
     */
    case TEXT = 'TEXT';

    case JSON = 'JSON';
}