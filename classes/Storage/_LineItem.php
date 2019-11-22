<?php

namespace Storage;

/**
 * Class _LineItem
 * @package Storage
 */
class _LineItem
{
    /**
     * @var string
     */
    public static $tableName = 'mysql';

    /**
     * @var array
     */
    public static $ptfMapping = array(
        'Id' => 'id',
        'line1' => 'line_1',
        'line2' => 'line_2',
        'line3' => 'line_3',
        'line4' => 'line_4',
        'line5' => 'line_5',
        'line6' => 'line_6',
        'line7' => 'line_7',
        'line8' => 'line_8',
        'line9' => 'line_9',
        'line10' => 'line_10',
    );

    /**
     * @return string
     */
    public static function getTableName()
    {
        return '`' . CFG_MYSQL_DATABASE . '`.`' . self::$tableName . '`';
    }

    /**
     * @return array
     */
    public static function getPropertyToFieldMapping()
    {
        return self::$ptfMapping;
    }

}
