<?php namespace Dashboard\Composers;

use Auth;

class EnvironmentComposer extends Composer {

    /**
     * Contains details of logged in user
     * @var obj
     */
    protected $user;

    /**
     * Set up $this->user
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind $user to the view
     * @param  string $view The view to bind the user to
     */
    public function compose($view)
    {
        $view->with('dashboard', $this->dashboard);
    }

}