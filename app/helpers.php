<?php
/**
 * @description 计算入职几年几个月
 * @param $entry_date
 * @return string
 */
function entry_years($entry_date)
{
    if (!$entry_date) return '（请补充）';
    $entry_time = strtotime($entry_date);
    $year = date('Y') - date('Y', $entry_time);
    $month = date('m') - date('m', $entry_time);

    if ($month < 0) {
        $year -= 1;
        $month += 12;
    }
    $year = $year > 0 ? $year . '年' : '';
    $month = $month > 0 ? $month . '月' : '';
    return $year . $month == '' ? '0' : $year . $month;
}
