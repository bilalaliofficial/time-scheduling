<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'schedule_id'   => $this->schedule_id,
            'day'           => $this->day,
            'date'          => $this->date,
            'title'         => $this->title,
            'description'   => $this->description,
            'schedule_type_id'=> $this->schedule_type_id,
            'schedule_type' => $this->schedule_type->type,
            'opening_time'  => $this->opening_time,
            'closing_time'  => $this->closing_time,
            'buffer_time'   => $this->buffer_time,
            'slot_duration' => $this->slot_duration,
            'slots'         => $this->slots,
            'status'        => $this->status
        ];
    }
}
