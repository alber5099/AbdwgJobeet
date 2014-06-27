<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 2014/6/24
 * Time: 下午 7:55
 */

// src\Abdwg\JobeetBundle\Utils\Jobeet.php
namespace Abdwg\JobeetBundle\Utils;

class Jobeet
{
    static public function slugify($text)
    {

        // replace all non letters or digits by -
         $text = preg_replace('/\W+/', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);

        //
        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}