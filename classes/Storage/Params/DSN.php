<?php

namespace Storage\Params;

/**
 * DSN parameter
 * @package Storage\Params
 */
class DSN
{

    /**
     * Get MySQL DSN string
     *
     * @param string $host
     * @param string $db
     * @return string
     */
    public static function getMySqlDSN($host, $db)
    {
        return "mysql:host=$host;dbname=$db";
    }

}
