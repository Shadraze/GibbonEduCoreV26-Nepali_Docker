<?php

namespace NepaliIntegration;

use Exception;

class CustomCalendar {
	private $calendarDataJsonFile = null;
    private $calendarData = null;

    public function __construct($calenderJsonPath) {
        $this->calendarDataJsonFile = file_get_contents($calenderJsonPath);
        $this->calendarData = json_decode( $this->calendarDataJsonFile, true);
    }

    public function getCalendarTimeZoneOffsetMs() {
        $offsetMs = 0;
        $offsetSplitStr = explode(" ", $this->calendarData["timeZoneOffset"]);
        
        $offsetMs += intval($offsetSplitStr[1]) * 60 * 60 * 1000;
        $offsetMs += intval($offsetSplitStr[2]) * 60 * 1000;
        
        if ($offsetSplitStr[0] == "-") {
            $offsetMs *= -1;
        }
        return $offsetMs;
    }

    public function moveFromEpochForwards($daysToMove) {
        $currentYear = $this->calendarData["calendarEpoch"]["year"];
        $currentMonth = $this->calendarData["calendarEpoch"]["month"];
        $currentDay = $this->calendarData["calendarEpoch"]["day"];
        
        $daysInCurrentMonth = $this->calendarData[strval($currentYear)][$currentMonth-1];
        while ($daysToMove > $daysInCurrentMonth) {
            $daysToMove -= $daysInCurrentMonth;
            $currentMonth += 1;
            if ($currentMonth > 12) {
                $currentYear += 1;
                $currentMonth = 1;
            }
            $daysInCurrentMonth = $this->calendarData[strval($currentYear)][$currentMonth-1];
        }

        $daysToMove = $currentDay + $daysToMove;
        while ($daysToMove > 0) {
            if ($daysToMove > $daysInCurrentMonth) {
                $daysToMove -= $daysInCurrentMonth;
                $currentMonth += 1;
                if ($currentMonth > 12) {
                    $currentYear += 1;
                    $currentMonth = 1;
                }
                $daysInCurrentMonth = $this->calendarData[strval($currentYear)][$currentMonth-1];
            } else {
                $currentDay = $daysToMove;
                $daysToMove = 0;
            }
        }

        return array("year" => $currentYear, "month" => $currentMonth, "day" => $currentDay);
    }

    public function timestampToCalendarDate($timestampMs) {
        try {
            $msSinceEpoch = $timestampMs + $this->getCalendarTimeZoneOffsetMs();
            $currentRemainingDays = floor($msSinceEpoch / 86400000);
            
            if ($currentRemainingDays > 0) {
                return $this->moveFromEpochForwards($currentRemainingDays);
            } else {
                return $this->calendarData["calendarEpoch"];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function dateAD_ToCalendarDate($dateAD) {
        $timestamp = strtotime($dateAD) * 1000;
        return $this->timestampToCalendarDate($timestamp);
    }
}
