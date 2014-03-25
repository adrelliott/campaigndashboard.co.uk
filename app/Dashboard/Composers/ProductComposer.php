<?php namespace Dashboard\Composers;

use Dashboard\Composers\Composer;

class ProductComposer extends Composer {

    /**
     * Bind $user to the view
     * @param  string $view The view to bind the user to
     */
    public function compose($view)
    {
        //Set up the current user
        $view->with('productList', array(1, 3, 4, 6));      
    }

}