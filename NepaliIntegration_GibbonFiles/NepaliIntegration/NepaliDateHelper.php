<?php

namespace NepaliIntegration;

require "NepaliIntegration/CustomCalendar.php";
use NepaliIntegration\CustomCalendar;

session_start();
// Test:
// $_SESSION['bsToggled'] = true;

class NepaliDateHelper
{
    private static CustomCalendar $calendarBS;
    private static bool $isBStoggled = false;

    public function __construct()
    {
        self::$calendarBS = new CustomCalendar('NepaliIntegration/bsCalendarData.json');                        
    }

    public static function AD2BS($adDate)
    {
        $bsDate = self::$calendarBS->dateAD_ToCalendarDate($adDate);
                
        $bsYear = $bsDate["year"];
        $bsMonth = $bsDate["month"];
        $bsDay = $bsDate["day"];

        return "BS ".$bsYear."-".$bsMonth."-".$bsDay;
    }

    public static function BSisToggled()
    {
        self::$isBStoggled = false;

        if(!empty($_SESSION['bsToggled']))
        {
            if($_SESSION['bsToggled'] === true)
            {
                self::$isBStoggled = true;
            }
        }
        else
        {
            $_SESSION['bsToggled'] = self::$isBStoggled;
        }
        
        return self::$isBStoggled;    
    }
}

const NpDateHelper = new NepaliDateHelper();

function AD2BS_ifToggledBS($adDate)
{
    $adDateParts = explode("/", $adDate);
    //php strtotime needs mm/dd/yyyy, before this is in dd/mm/yyyy
    $formatCorrectedADdate = $adDateParts[1]."/".$adDateParts[0]."/".$adDateParts[2];

    if(NpDateHelper->BSisToggled())
    {
        return NpDateHelper->AD2BS($formatCorrectedADdate);
    }
    return $adDate;
}


//// Test:
// function fillAdDates()
// {
//     $dates = array();   
//     foreach(range(1,29) as $index) {
//         array_push($dates,$index."/03"."/2024");
//         //do your magic here
//      }
//     foreach(range(1,30) as $index) {
//         array_push($dates,$index."/04"."/2024");
//         //do your magic here
//      }
//     foreach(range(1,31) as $index) {
//         array_push($dates,$index."/05"."/2024");
//         //do your magic here
//      }

//     return $dates;
// }

// $dates = fillAdDates();
// foreach ($dates as $date) {

//     print_r(AD2BS_ifToggledBS($date));
//     echo "\n";
// }
////
