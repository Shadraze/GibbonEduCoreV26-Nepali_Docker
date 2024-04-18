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
    if(NpDateHelper->BSisToggled())
    {
        return NpDateHelper->AD2BS($adDate);
    }
    return $adDate;
}

//// Test:
// $dates = array("2024/04/18", "2020/03/07");
// foreach ($dates as $date) {

//     print_r(AD2BS_ifToggledBS($date));
//     echo "\n";
// }
