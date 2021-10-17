<?php

if(! function_exists('to_money')){
    function to_money($value): string {
        return number_format($value, 2);
    }
}
