<?php namespace Dashboard\Sales;

use \Route;

// Contacts
Route::group(array(
    'prefix' => 'app',
    'namespace' => 'Dashboard\Sales', 
    'before' => 'auth'
    ), 
    function()
    {
        Route::resource('orders', 'OrdersController');
        Route::resource('products', 'ProductsController');
        Route::resource('leads', 'LeadsController');
    }
);




// Mucking about


// Route::get('app/seeOrders/{product_id}', function($product_id)
// {
//     $product = Product::find($product_id);

//     return $product->orders()->get();
// });


// Route::get('app/seeProducts/{order_id}', function($order_id)
// {
//     $order = Order::find($order_id);

//     return $order->products()->get();
// });

// Route::get('app/addProduct/{order_id}', function($order_id)
// {
//     $order = Order::find($order_id);
//     //var_dump($order->toJson());
//     //
//     //
//      $input = array(
//                 'product_id' => array(
//                     3, 4, 5
//                     ),
//                 'variant' => array(
//                     'a', 'b', 'c'
//                 ),
//                 'quantity' => array(
//                     3, 2, 1
//                 ),
//                 'price' => array(
//                     300, 400, 500
//                     ),
//             );
     

//      $data = array();
//      $standard = array(
//         'owner_id' => 10000,
//         'contact_id' => 3,
//         );
//      foreach ( $input['product_id'] as $k => $id )
//      {
//         foreach ( $input as $col => $a)
//         {
//             $data[$id][$col] = $input[$col][$k];
//         }
        
//         $data[$id] = array_merge($data[$id], $standard);
//         unset($data[$id]['product_id']);

//      }  

//      \Debug::dump($data);

//     // simulate order items
//     $orderItems = array(
//         // prodct_id => array(other attributes)
//         1 => array(
//             'owner_id' => 10000,
//              'contact_id' => 3,
//              'quantity' => 2,
//              'price' => 1233,
//              'variant' => '2012/13'
//         ),
//         2 => array(
//             'owner_id' => 10000,
//          'contact_id' => 3,
//          'quantity' => 4,
//          'price' => 133,
//          'variant' => '2013/14'
//         ),
//         4 => array(
//             'owner_id' => 10000,
//              'contact_id' => 3,
//              'quantity' => 6,
//              'price' => 233,
//              'variant' => '2012/13'
//         ),
//     );

//     \Debug::dump($orderItems, 1);

//     // $order->products()->sync($orderItems);
//     $order->products()
//         ->sync(
//             $data
//         );
//     // 

//     return $order->products;
//     // dd ($result);
// });






