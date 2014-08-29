<?php

if ( ! function_exists('ownerInclude'))
{
    /**
     * Include a file (render a partial view), taking into account the owner_id
     * of the current user.
     *
     * @param  Illuminate\View\Factory  $environment
     * @param  array $vars Variables from view context
     * @param  string  $path
     * @return View
     */
    function ownerInclude(Illuminate\View\Factory $environment, array $vars, $path)
    {
        $module = FALSE;
        $ownerId = FALSE;

        if (str_contains($path, '::'))
        {
            $module = explode('::', $path)[0];
            $path = explode('::', $path)[1];
        }

        $filePath = ($module ? "$module::" : '') . 'defaults.' . $path;

        if (Auth::user()->user())
        {
            $ownerId = Auth::user()->user()->owner_id;
            $customFilePath = ($module ? "$module::" : '') . $ownerId . '.' . $path;

            if ($environment->exists($customFilePath))
                $filePath = $customFilePath;
        }

        return $environment->make($filePath, $vars)
            ->render();
    }

}

if ( ! function_exists('cleverLayout') )
{

    function cleverLayout(Illuminate\View\Factory $environment, array $vars, $name)
    {
        if (Request::isXmlHttpRequest())
            return '';
        else
            return $environment->make($name, $vars)
                ->render();
    }

}