<?php


use DB\LineItemManager;

class Logic
{
    const ID = 1;

    public static function procces($line)
    {
        $DP = new LineItemManager('LineItem');
        $item = $DP->getById(self::ID);
        print_r($line);
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