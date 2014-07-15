<?php

Blade::extend(function($view, $compiler)
{
    $pattern = $compiler->createMatcher('ownerInclude');
    return preg_replace($pattern, '$1<?= ownerInclude($__env, array_except(get_defined_vars(), array(\'__data\', \'__path\')), $2) ?>', $view);
});