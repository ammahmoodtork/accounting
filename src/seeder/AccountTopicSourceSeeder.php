<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\TopicSources;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AccountTopicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
            array('created_at' => Carbon::now(), 'name' => 'Payment')
        );
        TopicSources::insert($list);
    }
}
