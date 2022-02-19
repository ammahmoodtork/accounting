<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\DocumentType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AccountDocumentTypeSeeder extends Seeder
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
                'name'=>'Opening Document'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Manual Document'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Auto Document'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Profit And Loss Document'
            ],
            [
                'created_at'=>Carbon::now(),
                'name'=>'Closing Document'
            ],
        ];
        DocumentType::insert($list);
	}
}
