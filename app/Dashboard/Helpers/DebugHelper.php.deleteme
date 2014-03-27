<?php namespace Helpers;

/**
* Creates a nicely formatted dump (tee hee!)
*/
class DebugHelper
{
    
    public static function dump($var, $die = FALSE, $label = 'Dump')
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($die) {
            die($output);
        }
        else {
             echo $output;
         }
    }
}