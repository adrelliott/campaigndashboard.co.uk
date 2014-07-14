<?php namespace Dashboard\Crm;

use CrudController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;
use Dashboard\Crm\Mailchimp\EmailLists;

class ContactsController extends CrudController {

    /**
     * The property that holds the list object
     * (We use this to subscribe and unsubscribe to our list - usually MailChimp)
     * @var obj
     */
    protected $emailLists;

    public function __construct(ModelInterface $repo, EmailLists $emailLists)
    {
        parent::__construct($repo);

        $this->emailLists = $emailLists;
    }

    public function addToList($id, $list = 'default')
    {
        $this->model = $this->repo->find($id);
        return $this->emailLists->subscribeTo($this->model, $list);
        #Get the contact model
        #Now, get the id of the list
        #Use Listinterface to subscribe
        
    }

}