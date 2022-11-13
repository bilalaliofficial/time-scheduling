<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'slot_id'   => ['required'],
            'first_name'=> ['required'],
            'last_name' => ['required'],
            'email'     => ['required','email'],
            'number_of_persons'=>['required','integer','min:1', 'max:3']
        ]);
        if($validator->fails()){
            return response()->json(['message'=>'The given data is invalid','errors'=>$validator->errors()->all()], 422);
        }else {
            $slot  = Slot::findOrFail($request->input('slot_id'));
            if ($slot->status == 'Booked'){
                return response()->json(['message' => 'Slot Already booked!'], 201);
            }
            $appointment_count = Appointment::where(['slot_id'=>$request->input('slot_id'),'status'=>'Booked'])->count();
            if ($request->input('number_persons') > $appointment_count){
                return response()->json(['message' => 'Already booked for '.$appointment_count.' persons'], 201);
            }
            $data = [
                'slot_id'   => $request->input('slot_id'),
                'first_name'=> $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email'     => $request->input('email'),
                'status'    => 'Booked',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ];
            $appointments = [];
            for ($i=0;$i<$request->input('number_persons');$i++){
                $appointments[] = $data;
            }

            if (!empty($appointments)){
                Appointment::insert($appointments);
                $appointment_count = Appointment::where(['slot_id'=>$request->input('slot_id'),'status'=>'Booked'])->count();
                if ($appointment_count >= 3){
                    $slot = Slot::find($request->input('slot_id'));
                    $slot->status = 'Booked';
                    $slot->save();
                }
            }
            return response()->json(['message' => 'Appointment Booked successfully'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
