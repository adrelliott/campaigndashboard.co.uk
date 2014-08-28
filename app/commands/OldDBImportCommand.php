<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Dashboard\Crm\Contact;

class OldDBImportCommand extends Command {

	protected $name = 'import';
	protected $description = 'Import';

	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
        $ownerId = 10000;

        Config::set('database.connections.temp', array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database'  => 'mymarket1_master',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
        $db = DB::connection('temp');

		// Import contacts first
        // $contacts = $db->table('contact')
        //     ->where('_dID', 22232)
        //     ->get();

        // foreach ($contacts as $contact)
        // {
        //     DB::table('contacts')->insert(array(
        //         'owner_id' => $ownerId,
        //         'title' => $contact->Title ?: null,
        //         'first_name' => $contact->FirstName ?: null,
        //         'last_name' => $contact->LastName ?: null,
        //         'nickname' => $contact->Nickname ?: null,
        //         'email' => $contact->Email ?: null,
        //         'email2' => $contact->EmailAddress2 ?: null,
        //         'mobile_phone' => $contact->Phone2 ?: null,
        //         'home_phone' => $contact->Phone1 ?: null,
        //         'work_phone' => null,
        //         'address1' => $contact->StreetAddress1,
        //         'company' => null,
        //         'address2' => $contact->StreetAddress2 ?: null,
        //         'address3' => null,
        //         'city' => $contact->City,
        //         'postcode' => $contact->PostalCode,
        //         'county' => $contact->State,
        //         'country' => $contact->Country,
        //         'legacy_id' => $contact->_LegacyMembershipNo,
        //         'gender' => ($contact->_Gender ? ($contact->_Gender == 'Female' ? Contact::GENDER_FEMALE : Contact::GENDER_MALE) : null),
        //         'date_of_birth' => $contact->Birthday,
        //         'twitter_id' => $contact->_TwitterName ?: null,
        //         'optin_email' => $contact->_OptinEmailYN,
        //         'optin_sms' => $contact->_OptinSmsYN,
        //         'optin_post' => $contact->_OptinSurfaceMailYN,
        //         'created_at' => $contact->DateCreated ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $contact->DateCreated))) : null,
        //         'updated_at' => date('Y-m-d H:i:s'),

        //         'overseas_phone' => $contact->Id, // borrow this column temporarily
        //         'deleted_at' => date('Y-m-d') . ' 00:00:00', // borrow this column temporarily
        //     ));
        // }

        // Grab the new and old IDs of all contacts
        $ids = DB::table('contacts')
            ->select('id', 'overseas_phone')
            ->where('deleted_at', date('Y-m-d'))
            ->get();
        $newIds = array();

        foreach ($ids as $id)
            $newIds[$id->id] = $id->overseas_phone;
        
        $newIdsFlipped = array_flip($newIds);

        // Now do roles
        // $roles = $db->table('contactaction')
        //     ->whereIn('ContactId', array_values($newIds))
        //     ->where('ActionType', 'Role')
        //     ->get();

        // Fetch all the 'action subtypes' – i.e., the roles themselves
        // foreach ($roles as $role)
        //     if (!isset($uniqueRoles[$role->_ActionSubtype]))
        //         $uniqueRoles[$role->_ActionSubtype] = array( 'role' => $role->_ActionSubtype, 'owner_id' => $ownerId );

        // dd(DB::table('roles')->insert($uniqueRoles));

        // $newRoles = DB::table('roles')->get();
        // $nRoles = array();
        // $contactRoles = array();

        // foreach ($newRoles as $r)
        //     $nRoles[$r->role] = $r->id;

        // foreach ($roles as $role)
        //     if ($role->_ActionSubtype)
        //         $contactRoles[] = array( 'contact_id' => $newIdsFlipped[$role->ContactId],
        //                                  'role_id' => $nRoles[$role->_ActionSubtype],
        //                                  'notes' => $role->ActionDescription,
        //                                  'season' => $role->_ValidUntil ?: null,
        //                                  'start' => $role->StartDate ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $role->StartDate))) : null,
        //                                  'end' => $role->EndDate ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $role->EndDate))) : null,
        //                                  'created_at' => $role->CreationDate,
        //                                  'updated_at' => $role->LastUpdated );

        // DB::table('contact_role')->insert($contactRoles);

        // Now orders
        $orders = $db->table('order')
            ->whereIn('ContactId', array_values($newIds))
            ->where('_dID', 22232)
            ->get();

        // dd($orders);

        $products = array();

        foreach ($orders as $order)
            if ($order->_ItemBought && !isset($products[$order->_ItemBought]))
                $products[$order->_ItemBought] = (float)trim(str_replace('£', '', $order->TotalPrice_A));

        foreach ($products as $prod => $price)
            DB::table('products')->insert(array(
                'owner_id' => $ownerId,
                'product_title' => $prod,
                'product_price' => $price,
                'product_category' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'), ));

        foreach ($orders as $order)
        {
            $product = DB::table('products')->where('product_title', $order->_ItemBought)->first();

            if ($order->_ItemBought && $product)
            {
                $newOrder = array(
                    'owner_id' => $ownerId,
                    'contact_id' => $newIdsFlipped[$order->ContactId],
                    'user_id' => null,
                    'lead_id' => null,
                    'payment_method' => $order->PaymentMethod ?: null,
                    'order_source' => $order->Source ?: null,
                    'order_reference' => $order->PaymentMethod ?: null,
                    'order_notes' => $order->OrderNotes ?: null,
                    'order_total' => (float)trim(str_replace('£', '', $order->TotalPrice_A)),
                    'order_date' => $order->DateCreated ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $order->DateCreated))) : date('Y-m-d H:i:s'),
                    'created_at' => $order->DateCreated ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $order->DateCreated))) : date('Y-m-d H:i:s'),
                    'updated_at' => $order->DateCreated ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $order->DateCreated))) : date('Y-m-d H:i:s'),
                );

                $id = DB::table('orders')->insertGetId($newOrder);
                $productId = $product->id;

                DB::table('order_product')->insert(array(
                    'owner_id' => $ownerId,
                    'order_id' => $id,
                    'product_id' => $productId,
                    'variant' => $order->_ValidUntil,
                    'quantity' => 1,
                    'price' => $newOrder['order_total'],
                    'created_at' => $newOrder['created_at'],
                    'updated_at' => $newOrder['updated_at'],
                ));
            }
        }
	}

	protected function getArguments()
	{
		return array();
	}

	protected function getOptions()
	{
		return array();
	}
}
