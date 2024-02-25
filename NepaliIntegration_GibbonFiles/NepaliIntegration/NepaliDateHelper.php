<?php

namespace NepaliIntegration;

use GuzzleHttp\Client;

class NepaliDateHelper
{
    private static Client $client;

    public function __construct()
    {
        self::$client = new Client();                        
    }

    private static function apiCallBackend($year, $month, $day)
    {
        $response = self::$client->post("nepali-integration-backend:8848/ad2bs", ['json' => ['year' => $year, 'month' => $month, 'day' => $day]]);
        return json_decode($response->getBody());
    }

    public static function AD2BS($adDate)
    {
        $adDateTime = strtotime($adDate);

        $adYear=date("Y",$adDateTime);
        $adMonth=date("m",$adDateTime);
        $adDay=date("d",$adDateTime);
        
        $bsDate = self::apiCallBackend($adYear,$adMonth,$adDay);

        $bsYear = $bsDate->year;
        $bsMonth = $bsDate->month;
        $bsDay = $bsDate->day;

        return $bsYear."-".$bsMonth."-".$bsDay;
    }
}

const NpDateHelper = new NepaliDateHelper();

function AD2BS($adDate)
{
    return NpDateHelper->AD2BS($adDate);
}