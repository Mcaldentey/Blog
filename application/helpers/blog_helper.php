<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('permalink'))
{
        function permalink($title){    
                return str_replace(" ", "-", strtolower($title));
        }
}