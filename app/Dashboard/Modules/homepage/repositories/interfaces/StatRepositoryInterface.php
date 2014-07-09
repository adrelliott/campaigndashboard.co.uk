<?php namespace Dashboard\Repositories;

/** 
 * This is the interface to get stats on the db
 */
interface StatRepositoryInterface {

    /**
     * Count all contacts who belong to a tenant
     * @return int 
     */
    public function countAllContacts();


    
}
