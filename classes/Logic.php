<?php

use Storage\LineItemManager;

/**
 * Class Logic
 */
class Logic
{
    /** @var int id of used row */
    const ID = 1;

    /**
     * @param string $line
     * @throws Exception
     */
    public static function process($line)
    {
        $DP = new LineItemManager('LineItem');
        $item = $DP->getById(self::ID);
        $item->line10 .= $item->line9;
        for ($i = 9; $i > 1; $i--) {
            $currentLine = 'line' . $i;
            $nextLine = 'line' . ($i - 1);
            $item->$currentLine = $item->$nextLine;
        }
        $item->line1 = $line;
        $DP->update($item);
    }
}
