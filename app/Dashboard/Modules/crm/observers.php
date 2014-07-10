<?php namespace Dashboard\Me;

use \Dashboard\Crm\Contact;
use \Dashboard\Observers\ContactObserver;

Contact::observe(new ContactObserver);