<?php

namespace App\Console\Commands;

use App\Models\Breaks;
use App\Models\Schedule;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RepeatSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repeat:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Repeat Schedule';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $configure_days = 20;
        $schedule_date = new Carbon(Schedule::all()->max('date'));
        $start_date = Carbon::now();
        $last_date = Carbon::now()->addDays($configure_days);
        if ($schedule_date > $start_date){
            $start_date = $schedule_date;
        }
        if ($schedule_date >= $last_date){
            return 0;
        }
        $difference = $last_date->diffInDays($start_date);
        $from_date = $start_date->copy();
        for ($i = 0; $i < $difference; $i++){
            $last_schedule = Schedule::where('day',$from_date->format('l'))->orderBy('schedule_id','desc')->first();
            $schedule = $last_schedule->replicate(['schedule_id','date','created_at','updated_at']);
            $schedule->date = $from_date->format('Y-m-d');
            $schedule->save();
            $this->createSlots($schedule);
            $from_date->addDay();
        }
    }

    public function createSlots(Schedule $schedule){
        $slots=[];
        $breaks = Breaks::where('schedule_id',$schedule->schedule_id)->get(['start_time','end_time']);
        $start_time = Carbon::parse($schedule->opening_time)->format('H:i');
        $end_time = Carbon::parse($schedule->closing_time)->format('H:i');
        while (strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = Carbon::parse($start_time)->addMinutes($schedule->slot_duration)->format('H:i');
            $start_time = Carbon::parse($start_time)->addMinutes($schedule->slot_duration+$schedule->buffer_time)->format('H:i');
            if (strtotime($start_time) <= strtotime($end_time)){
                if (!empty($breaks)){
                    foreach ($breaks as $break){
                        if($this->time_range($break->start_time,$break->end_time,$start_time)){
                            $start = $break->end_time;
                            $end = Carbon::parse($break->end_time)->addMinutes($schedule->slot_duration)->format('H:i');
                            $start_time = Carbon::parse($break->end_time)->addMinutes($schedule->slot_duration)->format('H:i');
                        }
                    }
                }
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
        if (!empty($slots)){
            Slot::insert($slots);
        }
    }

    public function time_range($start, $end,$time)
    {
        if($start > $end) {
            if($time >= $start || $time < $end){
                return true;
            }
        } else if ($time >= $start && $time <= $end) {
            return true;
        }
        return false;
    }
}
