<?php

namespace App\Helpers;

class Terbilang
{
    public static function make($number)
    {
        $number = abs($number);
        $words = array(
            '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'
        );
        $temp = "";

        if ($number < 12) {
            $temp = " " . $words[$number];
        } else if ($number < 20) {
            $temp = self::make($number - 10) . " belas";
        } else if ($number < 100) {
            $temp = self::make($number / 10) . " puluh" . self::make($number % 10);
        } else if ($number < 200) {
            $temp = " seratus" . self::make($number - 100);
        } else if ($number < 1000) {
            $temp = self::make($number / 100) . " ratus" . self::make($number % 100);
        } else if ($number < 2000) {
            $temp = " seribu" . self::make($number - 1000);
        } else if ($number < 1000000) {
            $temp = self::make($number / 1000) . " ribu" . self::make($number % 1000);
        } else if ($number < 1000000000) {
            $temp = self::make($number / 1000000) . " juta" . self::make($number % 1000000);
        } else if ($number < 1000000000000) {
            $temp = self::make($number / 1000000000) . " milyar" . self::make($number % 1000000000);
        } else if ($number < 1000000000000000) {
            $temp = self::make($number / 1000000000000) . " trilyun" . self::make($number % 1000000000000);
        }

        return $temp;
    }
} 