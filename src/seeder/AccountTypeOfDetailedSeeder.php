<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\TypeOfDetailed;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AccountTypeOfDetailedSeeder extends Seeder
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
                'name'=>'Person'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Bank Account'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Emploee'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Peoduct'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Shareholder'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Cash Desk'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Wallet'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Cost Center'
            ]
        ];
        TypeOfDetailed::insert($list);
	}
}
