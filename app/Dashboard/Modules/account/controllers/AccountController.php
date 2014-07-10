<?php namespace Dashboard\Account;

use BaseController, Auth, Input;
use \Dashboard\Admin\User;

class AccountController extends CrudController
{
    public function before($route, $request)
    {
        $this->record = Auth::user()->user();
    }

    // blahOne() – we're only working with one resource (a logged-in user will
    // only ever have one account)

    public function showOne()
    {
        return $this->handleResponse('showOne');
    }

    public function updateOne()
    {
        $this->record->fill(Input::all());
        $this->record->result = $this->record->save();
        $this->record->errors = $this->record->errors()->toArray();

        return $this->handleResponse('showOne');
    }
}