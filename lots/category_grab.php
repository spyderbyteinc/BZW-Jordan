<?php

    class Category{
        public $id = "";
        public $name = "";
        public $parent = "";
        public $children = "";
    }
    function getCategoryList(){
        include "../includes/connect.php";

        $all_levels = array();
        
        $level1 = array();
        $sql = "SELECT * FROM `cat_tier1`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = 0;

            array_push($level1, $temp);
        }
        array_push($all_levels, $level1);

        $level2 = array();
        $sql = "SELECT * FROM `cat_tier2`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];

            array_push($level2, $temp);
        }
        array_push($all_levels, $level2);

        $level2 = array();
        $sql = "SELECT * FROM `cat_tier2`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];

            array_push($level2, $temp);
        }
        array_push($all_levels, $level2);

        $level3 = array();
        $sql = "SELECT * FROM `cat_tier3`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];

            array_push($level3, $temp);
        }
        array_push($all_levels, $level3);

        $level4 = array();
        $sql = "SELECT * FROM `cat_tier4`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];

            array_push($level4, $temp);
        }
        array_push($all_levels, $level4);


        return $all_levels;
    }

    function getCategoryOne(){
        include "../includes/connect.php";

        $level1 = array();
        $sql = "SELECT * FROM `cat_tier1`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = 0;
            $temp->children = array();

            array_push($level1, $temp);
        }

        return json_encode($level1);
    }

    function getCategoryTwo(){
        include "../includes/connect.php";

        $level2 = array();
        $sql = "SELECT * FROM `cat_tier2`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];
            $temp->children = array();

            array_push($level2, $temp);
        }

        return json_encode($level2);
    }

    function getCategoryThree(){
        include "../includes/connect.php";

        $level3 = array();
        $sql = "SELECT * FROM `cat_tier3`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];
            $temp->children = array();

            array_push($level3, $temp);
        }

        return json_encode($level3);
    }

    function getCategoryFour(){
        include "../includes/connect.php";

        $level4 = array();
        $sql = "SELECT * FROM `cat_tier4`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            $temp = new Category();
            $temp->id = $row['id'];
            $temp->name = $row['name'];
            $temp->parent = $row['parent'];
            $temp->children = null;

            array_push($level4, $temp);
        }

        return json_encode($level4);
    }
?>