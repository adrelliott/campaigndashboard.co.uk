<?php

// use Dashboard\Admin\tag;

class TagTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('tags')->truncate();
        Eloquent::unguard();

        // IMPORTANT !!!!!!!!!!!!!!!!!!!!!!! Don;t forget to comment out the vTag 2idation rules to seed!
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 1",
                'tag_description' => "Tag 1 description",
                'owner_id' => '10000',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 2",
                'tag_description' => "Tag 2 description",
                'owner_id' => '10000',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 3",
                'tag_description' => "Tag 3 description",
                'owner_id' => '10000',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 1",
                'tag_description' => "Tag 1 description",
                'owner_id' => '10233',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 2",
                'tag_description' => "Tag 2 description",
                'owner_id' => '10233',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 3",
                'tag_description' => "Tag 3 description",
                'owner_id' => '10233',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 1",
                'tag_description' => "Tag 1 description",
                'owner_id' => '10222',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 2",
                'tag_description' => "Tag 2 description",
                'owner_id' => '10222',
            )
        );
        DB::table('tags')->insert(
            array(
                'tag_title' => "Tag 3",
                'tag_description' => "Tag 3 description",
                'owner_id' => '10222',
            )
        );
	}

}
