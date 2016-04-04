<?php

namespace Nostromo\Classes;

class Build
{
    /**
     * Formate une chaîne de caractère de type Time en format français.
     *
     * @param string $dateDuVol
     *
     * @return string
     */
    public static function formaterDate($dateDuVol)
    {
        $year = substr($dateDuVol, 0, -6);
        $month = substr($dateDuVol, 5, -3);
        $day = substr($dateDuVol, 8);

        return $day.'/'.$month.'/'.$year;
    }

    /**
     * Formate une chaine de caractères de type date en format français.
     *
     * @param string $heureDuVol
     *
     * @return string
     */
    public static function formaterHeure($heureDuVol)
    {
        return substr($heureDuVol, 0, -3);
    }

    /**
     * Formate une chaine de caractères de type DateTime en format français.
     *
     * @param string $var
     *
     * @return string
     */
    public static function formaterDateEtHeure($var)
    {
        $year = substr($var, 0, -15);
        $month = substr($var, 5, -12);
        $day = substr($var, 8, -9);
        $hour = substr($var, 10, -6);
        $min = substr($var, 14, -3);

        return $day.'/'.$month.'/'.$year.' à '.$hour.':'.$min;
    }

    public static function formaterEuro($arg)
    {
        return number_format($arg, 2, ',', ' ').' €';
    }
    public static function formaterDateTimeWithDate(\DateTime $arg)
    {
        return $arg->format('d/m/Y');
    }
    public static function formaterDateTimeWithTime(\DateTime $arg)
    {
        return $arg->format('d/m/Y H:i:s');
    }

    /**
     * @param float $price
     *
     * @return int
     */
    public static function getNewPoints($price)
    {
        $points = 0;
        for ($i = 0; $i < $price; $i += 1000) {
            $points++;
        }
        return $points;
    }
}
