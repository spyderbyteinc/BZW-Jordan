<?php
    function date_to_sql($date){
        // month/day/year -> year-month-day

        $comps = explode("/", $date);

        $ret = $comps[2] . "-" . $comps[0] . "-" . $comps[1];

        return $ret;
    }

    function sql_to_date($date){
        // year-month-day -> month/day/year
        
        $comps = explode("-", $date);

        $ret = $comps[1] . "/" . $comps[2] . "/" . $comps[0];

        return $ret;
    }

    
    // get month name with switch/case
    function month_convert($month){
    
        switch ($month){
            case 1:
                $month_name = "January";
                break;
            case 2:
                $month_name = "February";
                break;
            case 3:
                $month_name = "March";
                break;
            case 4:
                $month_name = "April";
                break;
            case 5:
                $month_name = "May";
                break;
            case 6:
                $month_name = "June";
                break;
            case 7:
                $month_name = "July";
                break;
            case 8:
                $month_name = "August";
                break;
            case 9:
                $month_name = "September";
                break;
            case 10:
                $month_name = "October";
                break;
            case 11:
                $month_name = "November";
                break;
            case 12:
                $month_name = "December";
                break;
        }

     return $month_name;
    }
?>