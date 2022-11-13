<?php

namespace Database\Seeders;

use App\Models\ScheduleType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduleType::insert([
            ['type'=>'Men Haircut','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['type'=>'Woman Haircut','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
    }
}
