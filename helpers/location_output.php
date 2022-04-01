<?php
    function loc_output($loc){
        $comps = explode("??||&&", $loc);

        $address1 = $comps[1];
        $address2 = $comps[2];
        $city = $comps[3];
        $state = $comps[4];
        $country = $comps[5];
        
        $output = "";

        if($address2 == -1){
            $output = $address1 . ", " . $city . ", " . $state . ", " . $country;
        }
        else{
            $output = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
        }

        return $output;
    }

    function loc_output_word_break($loc){
        $comps = explode("??||&&", $loc);

        $address1 = $comps[1];
        $address2 = $comps[2];
        $city = $comps[3];
        $state = $comps[4];
        $country = $comps[5];
        
        $output = "";

        if($address2 == -1){
            $output = $address1 . "\n" . $city . ", " . $state . ", " . $country;
        }
        else{
            $output = $address1 . "\n" . $address2 . "\n" . $city . ", " . $state . ", " . $country;
        }

        return $output;
    }
?>