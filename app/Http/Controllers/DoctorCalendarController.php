<?php

namespace App\Http\Controllers;

use App\Http\Services\AppointmentService;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAppointmentRequest;
use \App\Models\AppointmentRequest;

class DoctorCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = auth()->user()->doctor->patients;
        $appointments = Appointment::where('doctor_id', auth()->user()->doctor->id)->orderByDesc('created_at')->paginate(5);
        return view('doctor.pages.calendar', compact('patients', 'appointments'));
    }

    public function refetchAppointments(Request $request){
        $appointmentService = new AppointmentService(auth()->user()->doctor);
        $appointments = $appointmentService->allAppointments($request->all());
        return response()->json($appointments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAppointmentRequest $request)
    {
        $data = $request->all();
        $data['doctor_id'] = auth()->user()->doctor->id;
        $reqapp = AppointmentRequest::where('patient_id', $data['patient_id'])->latest()->firstOrFail();
        $reqapp->status = 'success';
        $reqapp->save();
        $appointmentService = new AppointmentService(auth()->user()->doctor);
        $appointment = $appointmentService->create($data);
        if($appointment){
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
