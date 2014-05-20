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
    function getTable($tableName, $config, $url = NULL, $fields = array())
    {
        # Set up the table
        $retval = Datatable::table(); 

        # Set up the options
        $config = $config['tables']['contacts_index'];

        #Set up a URL if passed
        if ( $url )
        {
            # Set the Url
            $config['setUrl'] = $url;

            # If fields are passed then replace %field% with values
            foreach ( $fields as $field => $value )
            {
                if ( strpos($url, '%' . $field . '%') )
                {
                    $url = str_replace('%' . $field . '%', $value, $url);
                }
            } 
        }

        foreach ( $config['options'] as $option => $value )
        {
            $retval->{$option}($value);
        }

        // # Don't output the script (this is dealt withnin assets/datatables/custom.js)
        $retval->noScript();

        return $retval->render($config['tableTemplate']);
    }
}
