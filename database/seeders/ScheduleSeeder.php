<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::insert([
            ['schedule_type_id'=>1,'day'=>'Monday','date'=>'2022-11-14','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>5,'slot_duration'=>10,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Tuesday','date'=>'2022-11-15','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>5,'slot_duration'=>10,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Wednesday','date'=>'2022-11-16','title'=>'Public Holiday','opening_time'=>null,'closing_time'=>null,'buffer_time'=>null,'slot_duration'=>null,'status'=>0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Thursday','date'=>'2022-11-17','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>5,'slot_duration'=>10,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Friday','date'=>'2022-11-18','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>5,'slot_duration'=>10,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Saturday','date'=>'2022-11-19','title'=>'HairCut','opening_time'=>'10:00','closing_time'=>'22:00','buffer_time'=>5,'slot_duration'=>10,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>1,'day'=>'Sunday','date'=>'2022-11-20','title'=>'Off','opening_time'=>null,'closing_time'=>null,'buffer_time'=>null,'slot_duration'=>null,'status'=>0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Monday','date'=>'2022-11-14','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>10,'slot_duration'=>60,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Tuesday','date'=>'2022-11-15','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>10,'slot_duration'=>60,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Wednesday','date'=>'2022-11-16','title'=>'Public Holiday','opening_time'=>null,'closing_time'=>null,'buffer_time'=>null,'slot_duration'=>null,'status'=>0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Thursday','date'=>'2022-11-17','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>10,'slot_duration'=>60,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Friday','date'=>'2022-11-18','title'=>'HairCut','opening_time'=>'08:00','closing_time'=>'20:00','buffer_time'=>10,'slot_duration'=>60,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Saturday','date'=>'2022-11-19','title'=>'HairCut','opening_time'=>'10:00','closing_time'=>'22:00','buffer_time'=>10,'slot_duration'=>60,'status'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['schedule_type_id'=>2,'day'=>'Sunday','date'=>'2022-11-20','title'=>'Off','opening_time'=>null,'closing_time'=>null,'buffer_time'=>null,'slot_duration'=>null,'status'=>0,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
    }
}
