<?php

namespace ammahmoodtork\accounting\seeder;

use ammahmoodtork\accounting\Models\TopicGroups;
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
            array('created_at' => Carbon::now(), 'name' => 'Debts'),
            array('created_at' => Carbon::now(), 'name' => 'Returns From Purchases And Discounts'),
            array('created_at' => Carbon::now(), 'name' => 'Sales Returns And Discounts'),
            array('created_at' => Carbon::now(), 'name' => 'Disciplinary Accounts'),
            array('created_at' => Carbon::now(), 'name' => 'Equity'),
            array('created_at' => Carbon::now(), 'name' => 'Buy'),
            array('created_at' => Carbon::now(), 'name' => 'Property'),
            array('created_at' => Carbon::now(), 'name' => 'Income'),
            array('created_at' => Carbon::now(), 'name' => 'Cost And Benefit'),
            array('created_at' => Carbon::now(), 'name' => 'Sale'),
            array('created_at' => Carbon::now(), 'name' => 'Cost')
        );
        TopicGroups::insert($list);
    }
}
