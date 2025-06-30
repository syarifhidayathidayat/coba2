<?php

if (!function_exists('terbilang')) {
    function terbilang($number)
    {
        $number = abs($number);
        $words = [
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas'
        ];
        $temp = "";

        if ($number < 12) {
            $temp = " " . $words[$number];
        } else if ($number < 20) {
            $temp = terbilang($number - 10) . " belas";
        } else if ($number < 100) {
            $temp = terbilang($number / 10) . " puluh" . terbilang($number % 10);
        } else if ($number < 200) {
            $temp = " seratus" . terbilang($number - 100);
        } else if ($number < 1000) {
            $temp = terbilang($number / 100) . " ratus" . terbilang($number % 100);
        } else if ($number < 2000) {
            $temp = " seribu" . terbilang($number - 1000);
        } else if ($number < 1000000) {
            $temp = terbilang($number / 1000) . " ribu" . terbilang($number % 1000);
        } else if ($number < 1000000000) {
            $temp = terbilang($number / 1000000) . " juta" . terbilang($number % 1000000);
        } else if ($number < 1000000000000) {
            $temp = terbilang($number / 1000000000) . " milyar" . terbilang($number % 1000000000);
        } else if ($number < 1000000000000000) {
            $temp = terbilang($number / 1000000000000) . " trilyun" . terbilang($number % 1000000000000);
        }

        return $temp;
    }




    if (!function_exists('bulanRomawi')) {
        function bulanRomawi($bulan)
        {
            $romawi = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII'
            ];

            return $romawi[(int) $bulan] ?? '';
        }
    }
}
