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
        $schedules = Schedule::where('status',1)->get();
        if (!empty($schedules)){
            $slots = [];
            $start_time = null;
            foreach ($schedules as $schedule){
                $start_time = Carbon::parse($schedule->opening_time)->format('H:i');
                $end_time = Carbon::parse($schedule->closing_time)->format('H:i');
                while (strtotime($start_time) <= strtotime($end_time)){
                    $start = $start_time;
                    $end = Carbon::parse($start_time)->addMinutes($schedule->slot_duration)->format('H:i');
                    $start_time = Carbon::parse($start_time)->addMinutes($schedule->slot_duration+$schedule->buffer_time)->format('H:i');
                    if (strtotime($start_time) <= strtotime($end_time)){
                        $slots[] = [
                            'schedule_id'   => $schedule->schedule_id,
                            'start_time'    => $start,
                            'end_time'      => $end,
                            'status'        => 'Available',
                            'created_at'    => Carbon::now(),
                            'updated_at'    => Carbon::now()
                        ];
                    }
                }
            }
            if (!empty($slots)){
                Slot::insert($slots);
            }
        }
    }
}
