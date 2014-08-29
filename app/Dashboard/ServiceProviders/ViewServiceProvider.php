<?php namespace Dashboard\ServiceProviders;

use Dashboard\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\ViewServiceProvider as BaseServiceProvider;

class ViewServiceProvider extends BaseServiceProvider {
    
    public function registerBladeEngine($resolver)
    {
        $app = $this->app;

        $app->bindShared('blade.compiler', function($app)
        {
            $cache = $app['path.storage'].'/views';
            return new BladeCompiler($app['files'], $cache);
        });

        $resolver->register('blade', function() use ($app)
        {
            return new CompilerEngine($app['blade.compiler'], $app['files']);
        });
    }

}