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
?>