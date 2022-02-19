<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\DocumentState;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AccountDocumentStateSeeder extends Seeder
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
                'name'=>'Not Confirmed'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Confirmed'
            ]
        ];
        DocumentState::insert($list);
	}
}
