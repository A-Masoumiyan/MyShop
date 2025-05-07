<?php

use Morilog\Jalali\Jalalian;

if (!function_exists('Jdatetime')) {
    /**
     * نمایش تاریخ و زمان به‌صورت شمسی (مثلاً: 1403/08/17 14:30:00)
     */
    function Jdatetime($carbonDate)
    {
        return $carbonDate ? Jalalian::fromCarbon($carbonDate)->format('Y/m/d H:i:s') : null;
    }
}

if (!function_exists('Jdate')) {
    /**
     * نمایش فقط تاریخ به‌صورت شمسی (مثلاً: 1403/08/17)
     */
    function Jdate($carbonDate)
    {
        return $carbonDate ? Jalalian::fromCarbon($carbonDate)->format('Y/m/d') : null;
    }
}

if (!function_exists('Jtime')) {
    /**
     * نمایش فقط زمان به‌صورت شمسی (مثلاً: 14:30:00)
     */
    function Jtime($carbonDate)
    {
        return $carbonDate ? Jalalian::fromCarbon($carbonDate)->format('H:i:s') : null;
    }
}

if (!function_exists('Jdatename')) {
    /**
     * نمایش تاریخ با نام ماه فارسی (مثلاً: 17 آبان 1403)
     */
    function Jdatename($carbonDate)
    {
        return $carbonDate ? Jalalian::fromCarbon($carbonDate)->format('j F Y') : null;
    }
}
