<?php

Blade::extend(function($view, $compiler)
{
    $pattern = $compiler->createMatcher('ownerInclude');
    return preg_replace($pattern, '$1<?= ownerInclude($__env, array_except(get_defined_vars(), array(\'__data\', \'__path\')), $2) ?>', $view);
});

Blade::extend(function($view, $compiler)
{
    $pattern = $compiler->createMatcher('cleverLayout');
    
    preg_match_all($pattern, $view, $matches);

    if (!empty($matches[2]))
    {
        $compiler->addToFooter('<?php echo cleverLayout($__env, array_except(get_defined_vars(), array(\'__data\', \'__path\')), '.$matches[2][0].') ?>');
    }

    return preg_replace($pattern, '', $view);
});