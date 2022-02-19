<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\DetailedSource;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DetailedSourceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $list =[
            [
                'created_at'=>Carbon::now(),
                'name'=>'Banks Accounts'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Wallets'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Customers'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Products'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Customers'
            ]
        ];
        DetailedSource::insert($list);
	}
}
