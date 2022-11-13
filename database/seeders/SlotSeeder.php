<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = Schedule::where('status',1)->whereDate('date','2022-11-14')->get();
        if (!empty($schedules)){
            $slots = [];
            $start_time = null;
            foreach ($schedules as $schedule){
                $start_time = $schedule->opening_time;
                $end_time = Carbon::parse($schedule->opening_time)->addMinutes($schedule->slot_duration)->format('H:i:s');
                while(!empty($start_time)){
                    $slots[] = [
                        'schedule_id'   => $schedule->schedule_id,
                        'start_time'    => $start_time,
                        'end_time'      => $end_time,
                        'status'        => 'Available'
                    ];
                    if ($end_time < $schedule->closing_time){
                        $start_time = Carbon::parse($end_time)->addMinutes($schedule->buffer_time)->format('H:i:s');
                        $end_time = Carbon::parse($schedule->opening_time)->addMinutes($schedule->slot_duration)->format('H:i:s');
                    }else{
                        $start_time = null;
                        $end_time = null;
                    }
                }
            }
            Slot::insert($slots);
        }
    }
}
