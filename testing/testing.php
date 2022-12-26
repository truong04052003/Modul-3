<?php
    function sum($a,$b){
        return 5;
    }

    //Truong hop 1
    $your_output = sum(2,3);
    $expect_output = 5;
    if( $your_output == $expect_output ){
        echo 'OK';
    }else{
        echo 'Failed';
    }

    echo '<hr>';
    
    //Truong hop 2
    $your_output = sum(5,5);
    $expect_output = 10;
    if( $your_output == $expect_output ){
        echo 'OK';
    }else{
        echo 'Failed';
    }
