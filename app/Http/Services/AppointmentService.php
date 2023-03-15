<?php

namespace App\Http\Services;

use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentService {

    protected $doctor;

    public function __construct($doctor){
        $this->doctor = $doctor;
        // $this->googleService = new GoogleService($doctor);
    }

    public function create($data){
//        if(isset($data['is_all_day']) && $data['is_all_day'] == '1'){
//            $date_diff = Carbon::createFromTimestamp(strtotime($data['end']))->diffInDays(Carbon::createFromTimestamp(strtotime($data['start'])));
//            $data['end'] = Carbon::createFromTimestamp(strtotime($data['start']))->addDays($date_diff)->toDateString();
//        }
        $appointment = new Appointment($data);
        $appointment->save();
//        SyncEventWithGoogle::dispatch($appointment, $this->doctor);
        return $appointment;
    }

    public function allAppointments($filters){
        $appointmentQuery = Appointment::query();
        $appointmentQuery->where('doctor_id', $this->doctor->id);
        if($filters['start']){
            $appointmentQuery->where('start', '>=', $filters['start']);
        }
        if($filters['end']){
            $appointmentQuery->where('end', '<=', $filters['end']);
        }
        $appointments = $appointmentQuery->get();
        $data = [];
        foreach ($appointments as $app){
            if(!(int)$app['is_all_day']){
                $app['allDay'] = false;
                $app['start'] = Carbon::createFromTimestamp(strtotime($app['start']))->toDateTimeString();
                $app['end'] = Carbon::createFromTimestamp(strtotime($app['end']))->toDateTimeString();
                $app['endDay'] = $app['end'];
                $app['startDay'] = $app['start'];
            }else{
                $app['allDay'] = true;
                $app['endDay'] = Carbon::createFromTimestamp(strtotime($app['end']))->addDays(-1)->toDateString();
                $app['startDay'] = $app['start'];
            }
            $app['eventId'] = $app['id'];
            array_push($data, $app);
        }
        return $data;
    }


}
