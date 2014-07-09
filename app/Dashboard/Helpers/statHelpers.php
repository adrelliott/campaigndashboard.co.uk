<?php

if ( ! function_exists('getStat'))
{
    /**
     * gets a stat based on the users config
     *
     * @param  string  $name
     * @param  array   $parameters
     * @return string
     */
    function getStat($statName, $config = array()) {

        # Have we passed a config array?
        if ( ! array_key_exists($statName, $config) )
            return NULL;
        $config = $config[$statName];

        # Do we have keys for both repo and method?
        if ( ! array_key_exists('model', $config) OR ! array_key_exists('method', $config) )
            return NULL;

        # Get the stat using the model
        $retval = $config['model'] :: $config['method'];

    }
}