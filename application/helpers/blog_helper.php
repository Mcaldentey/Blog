<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('permalink'))
{
        function permalink($title){ //replaces the spaces of the tittle to '-' and uppercases to lowercases
                return str_replace(" ", "-", strtolower($title));
        }

        function login_site(){  // if user is not logged redirect him to login page
                $CI =& get_instance();         
                if(!$CI->session->userdata('is_logged_in'))
                        redirect(base_url().'users/signin');
        }

        function tags($tags){ //Separate all the tags
                $tags = explode(',', $tags);
                foreach ($tags as $t)
                        echo '<u>'.$t.'</u> ';                 
        }
}