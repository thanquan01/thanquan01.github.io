<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');


$GLOBALS["carriers_number"] = [
    '096' => 'Viettel',
    '097' => 'Viettel',
    '098' => 'Viettel',
    '032' => 'Viettel',
    '033' => 'Viettel',
    '034' => 'Viettel',
    '035' => 'Viettel',
    '036' => 'Viettel',
    '037' => 'Viettel',
    '038' => 'Viettel',
    '039' => 'Viettel',
    '086' => 'Viettel',

    '090' => 'Mobifone',
    '093' => 'Mobifone',
    '070' => 'Mobifone',
    '071' => 'Mobifone',
    '072' => 'Mobifone',
    '076' => 'Mobifone',
    '078' => 'Mobifone',

    '091' => 'Vinaphone',
    '094' => 'Vinaphone',
    '083' => 'Vinaphone',
    '084' => 'Vinaphone',
    '085' => 'Vinaphone',
    '087' => 'Vinaphone',
    '089' => 'Vinaphone',
    '088' => 'Vinaphone',

    '099' => 'Gmobile',

    '092' => 'Vietnamobile',
    '056' => 'Vietnamobile',
    '058' => 'Vietnamobile',

    '095'  => 'SFone'
];

function start_with($needle, $haystack)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function detect_number($number)
{
    $number = str_replace(array('-', '.', ' '), '', $number);
    
    if (!preg_match('/^0[0-9]{9,10}$/', $number))
        return false;
    
    $start_numbers = array_keys($GLOBALS["carriers_number"]);
    
    foreach ($start_numbers as $start_number) {
        if (start_with($start_number, $number)) {
            return $GLOBALS["carriers_number"][$start_number];
        }
    }
    return false;
}

function home_url()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domain   = $_SERVER['HTTP_HOST'];
        return $protocol . $domain;
}

function generateRandomString($length = 100)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}