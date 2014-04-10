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
    function getTable($tableName, $config)
    {
        # Set up the table
        $retval = Datatable::table(); 

        # Set up the options
        $config = $config['tables']['contacts_index'];

        foreach ( $config['options'] as $option => $value )
        {
            $retval->{$option}($value);
        }

        // # Don't output the script (this is dealt withnin assets/datatables/custom.js)
        $retval->noScript();

        return $retval->render($config['tableTemplate']);
    }
}
