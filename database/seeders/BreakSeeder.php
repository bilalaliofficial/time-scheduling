<?php

namespace Database\Seeders;

use App\Models\Breaks;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BreakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Breaks::insert([
            ['schedule_id'=>1,'name'=>'Lunch Break','start_time'=>'12:00','end_time'=>'13:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>2,'name'=>'Lunch Break','start_time'=>'12:00','end_time'=>'13:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>4,'name'=>'Lunch Break','start_time'=>'12:00','end_time'=>'13:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>5,'name'=>'Lunch Break','start_time'=>'12:00','end_time'=>'13:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>6,'name'=>'Lunch Break','start_time'=>'12:00','end_time'=>'13:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>1,'name'=>'Cleaning Break','start_time'=>'15:00','end_time'=>'16:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>2,'name'=>'Cleaning Break','start_time'=>'15:00','end_time'=>'16:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>4,'name'=>'Cleaning Break','start_time'=>'15:00','end_time'=>'16:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>5,'name'=>'Cleaning Break','start_time'=>'15:00','end_time'=>'16:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_id'=>6,'name'=>'Cleaning Break','start_time'=>'15:00','end_time'=>'16:00','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
    }
}
