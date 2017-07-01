<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('day_encode'))
{
    function day_encode($str = "") {
    	if (!empty($str)) {
    		return DateTime::createFromFormat('d/m/Y', $str)->format('Y-m-d');
    	}
    	return "";
    }
}

if ( ! function_exists('day_decode'))
{
    function day_decode($str = "") {
    	if (!empty($str)) {
    		return DateTime::createFromFormat('Y-m-d', $str)->format('d/m/Y');
    	}
    	return "";
    }
}