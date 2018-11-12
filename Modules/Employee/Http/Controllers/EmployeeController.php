<?php

namespace Modules\Employee\Http\Controllers;

use App\Libraries\Encryption;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Employee\Entities\Attendance;
use Modules\Employee\Entities\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('employee::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('employee::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('employee::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('employee::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }


    public function allEmployee()
    {
        return view('employee::all-employee');
    }

    public function employeeAttendance()
    {
        return view('employee::employee-attendance');
    }

    public function employeeLogOff(Request $request)
    {
        $user_id = Sentinel::getUser()->id;
        $employee_id = Employee::leftjoin('users', 'employees.user_id', '=', 'users.id')->first(['employees.id']);
        $responseData = [
            'responseCode' => 0,
            'message' => 'Something Went Wrong'
        ];

        $isUpdate = Attendance::firstOrNew(['employee_id' => $employee_id])
            ->whereDate('created_at', Carbon::today())
            ->update(['exit_time' => Carbon::now()]);
        if ($isUpdate) {
            $responseData = [
                'responseCode' => 1,
                'message' => 'Successfully Update'
            ];
        }
        return response()->json($responseData);
    }

    public function employeeAdd($uId)
    {
        $uId = Encryption::decodeId($uId);
        $objEmployee = new Employee();
        $objEmployee->user_id = $uId;
        $objEmployee->office_id = 1;
        $objEmployee->address = 'Pakundiya';
        $objEmployee->police_station = 'Pakundiya';
        $objEmployee->district = 'Kishoregonj';
        $objEmployee->employee_type = '7x707';
        $objEmployee->save();

        return redirect()->back();
    }

    public function attendanceDetails($emp_id)
    {
        $emp_id = Encryption::decodeId($emp_id);
        $attenDancesDetails = Attendance::leftjoin('employees', 'attendances.employee_id', '=', 'employees.id')
            ->leftjoin('users', 'employees.user_id', '=', 'users.id')
            ->whereMonth('attendances.created_at', '=', Carbon::now()->month)
            ->where('attendances.employee_id', $emp_id)
            ->orderBy('attendances.entry_time', 'desc')
            ->get(['users.first_name', 'users.last_name', 'attendances.entry_time', 'attendances.exit_time']);
        return view('employee::attendance-details', compact('attenDancesDetails'));
    }
}
