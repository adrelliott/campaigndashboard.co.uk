<?php namespace Dashboard\Repositories;

use Dashboard\Crm\Contact as Model;

class EloquentContactRepository extends EloquentRepository implements ContactRepositoryInterface {

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
            // When we are getting a able of order items, add col of product name
            case 'orderProducts':
                $this->datatable->addColumn('Product name', function($model)
                    {
                        $retval = $model->product->product_title . ' (at £';
                        $retval .= round($model->price / 100, 2) . ')';
                        return $retval;
                    }
                );
                $this->datatable->addColumn('Qty', function($model)
                    {
                        return (string)$model->quantity;
                    }
                );
                $this->datatable->addColumn('Total', function($model)
                    {
                        $total = $model->quantity * $model->price;
                        return '£' . round($total / 100, 2);
                    }
                );
                break;
            
            default:
                # code...
                break;
        }

        
    }


    


}