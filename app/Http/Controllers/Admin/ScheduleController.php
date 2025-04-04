<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\schedule;
use App\Models\User;

use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function Schedule(Request $request){
        $validator = Validator::make($request->all(),
        [
            'user_id'=>'required|exists:users,id',
            'date_start'=>'required|datetime-local',
            'date_finish'=>'required|datetime-local|after:date_start'
        ]);

        $schedule = Schedule::create([
            'date_start'=>$request->date_start,
            'date_finish'=>$request->date_finish,
        ]);

        $user = User::find($request->user_id);
        $user ->schedules()->attach($schedule->id);

        return redirect()->route('admin.users');
        
    }



}
