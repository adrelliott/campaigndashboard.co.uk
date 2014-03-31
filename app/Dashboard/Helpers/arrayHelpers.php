
<?php

if ( ! function_exists('flatten'))
{
    /**
     * Flattens a multi-dim array
     *
     * @param  array   $input
     * @return array
     */
    function flatten($input)
    {
        foreach ( $input as $k )
        {
            if ( is_array($k) )
            {
                foreach ( $k as $k2 => $v )
                {
                    $input[$k2] = $v;
                }
            }
        }

        return $input;
    }
}