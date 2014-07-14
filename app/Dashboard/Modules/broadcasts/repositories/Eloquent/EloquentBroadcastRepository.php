<?php namespace Dashboard\Repositories;

use Dashboard\Broadcasts\Broadcast as Model;

class EloquentBroadcastRepository extends EloquentRepository implements BroadcastRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    /**
     * Handles the output of a Datatable (as defined in EloquentRepository@makeDatatable)
     * @param string $tableName Often this is the relatedModel value
     */
    protected function addCustomColumns( $tableName )
    {
        // $tableName is often the relatedModel name
        switch ( $tableName )
        {
            // When we are getting a Table of order items, add col of product name
            case 'broadcasts':
                $this->datatable->addColumn('Sent At', function($model)
                    {
//                         $retval = $model->product->product_title . ' (at £';
// //                        $retval .= round($model->price / 100, 2) . ')';
//                         $retval .= number_format((float)$model->price / 100, 2, '.', ',') . ')';
//                         return $retval;
                        return 'xxx';
                    }
                );
                
                break;
            
            default:
                # code...
                break;
        }

        
    }

}