<?php

if ( ! function_exists('getTable'))
{
    /**
     * gets table output based on the users config
     *
     * @param  string  $name
     * @param  array   $parameters
     * @return string
     */
    function getTable($tableName, $config, $fields = FALSE, $url = FALSE, $data = array())
    {
        # Set up the table
        $retval = Datatable::table(); 

        # Set up the options
        $config = $config['tables'][$tableName];

        // Allow an override for the data (rather than using a URL)
        if ( $data )
        {
            $retval->setData($data);
            $retval->setOptions('sAjaxSource', FALSE);
        }

        # If $fields is set then replace %field% with values passed in $fields
        if ( $fields )
        {
            foreach ( $fields as $field => $value )
            {
                if ( strpos($url, '%' . $field . '%') )
                {
                    $url = str_replace('%' . $field . '%', $value, $url);
                }
            } 
        }

        # Add url back into options
        if ( $url || isset($config['options']['setUrl']) )
            $config['options']['setUrl'] = $url ?: $config['options']['setUrl'];

        # Add table name as a class
        $config['options']['setClass'] = $tableName;

//        dump($config);var_dump($tableName); dump($fields, 1);

        # Set up any options passed in the config array
        foreach ( $config['options'] as $option => $value )
        {
            $retval->{$option}($value);
        }

        # Don't output the script (this is dealt within assets/datatables/custom.js)
        $retval->noScript();

        return $retval->render($config['tableTemplate']);
    }
}
