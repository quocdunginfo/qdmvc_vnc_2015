<?php

class QdDgHistory extends QdDgInStock
{
    static $table_name = 'mpd_dg_history';

    public static function getInitObj()
    {
        $obj = new QdDgHistory();
        return $obj;
    }

}