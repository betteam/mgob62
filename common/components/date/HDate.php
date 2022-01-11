<?php


namespace common\components\date;


class HDate
{
    /**
     * Возвращает количество дней между датами
     * @param $date_start
     * @param $date_finish
     * @return int|null
     */
    public static function getIntervalDays($date_start, $date_finish){
        if($date_start >= $date_finish){
            return null;
        }

        $diff = $date_finish - $date_start;

        return intval($diff/60/60/24);
    }
}