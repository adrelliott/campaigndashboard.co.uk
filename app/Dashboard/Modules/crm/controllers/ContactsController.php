<?php namespace Dashboard\Crm;

use CrudController, View, Request, Input;
use Dashboard\Crm\Mailchimp\EmailLists;
use Dashboard\Tags\Tag;
use Dashboard\Repositories\SearchableContactRepositoryInterface as ModelInterface;

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
        View::share('newDatatables', TRUE);
    }

    public function edit($id)
    {
        $view = parent::edit($id);

        $allTags = Tag::forJson();
        $tags = $this->model->tags;

        return $view->with(array(
            'allTags' => $allTags,
            'tags' => $tags,
        ));
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