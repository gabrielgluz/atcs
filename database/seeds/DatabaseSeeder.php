<?php

use App\Models\Aircraft;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$aircrafts = [
    		[
    			'name' => 'Emergency 001',
    			'type' => 'Emergency',
    			'size' => 'Large'
    		],
    		[
    			'name' => 'Emergency 002',
    			'type' => 'Emergency',
    			'size' => 'Large'
    		],
    		[
    			'name' => 'Emergency 003',
    			'type' => 'Emergency',
    			'size' => 'Small'
    		],
    		[
    			'name' => 'VIP 001',
    			'type' => 'VIP',
    			'size' => 'Large'
    		],
    		[
    			'name' => 'VIP 002',
    			'type' => 'VIP',
    			'size' => 'Small'
    		],
    		[
    			'name' => 'Cargo 001',
    			'type' => 'Cargo',
    			'size' => 'Small'
    		],
    		[
    			'name' => 'Cargo 002',
    			'type' => 'Cargo',
    			'size' => 'Large'
    		],
    		[
    			'name' => 'Passenger 001',
    			'type' => 'Passenger',
    			'size' => 'Large'
    		],
    		[
    			'name' => 'Passenger 002',
    			'type' => 'Passenger',
    			'size' => 'Small'
    		]
    	];

    	Aircraft::insert($aircrafts);
    }
}
