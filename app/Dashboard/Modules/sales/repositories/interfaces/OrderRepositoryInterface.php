<?php namespace Dashboard\Repositories;

/** 
 * This extends the RepositoryInteface, so all those methods are available here.
 *
 * use this Interface to define Contact specific methods, e.g. getDateOfBirth()
 */
interface OrderRepositoryInterface extends RepositoryInterface {

    public function syncOrderItems($order);
  
}