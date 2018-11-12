<?php

namespace Modules\Login\Http\Controllers;

use Carbon\Carbon;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Employee\Entities\Attendance;
use Modules\Employee\Entities\Employee;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('login::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('login::create');
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
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('login::edit');
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

    public function registration()
    {
        return view('login::registration');
    }

    public function signup(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:18|confirmed',
            'password_confirmation' => 'required'
        ]);

        $password = $request->get('password');
        $con_pass = $request->get('password_confirmation');
        $email = $request->get('email');

        // Todo::email validation 

        if (!(strlen($password) > 5) || !(strlen($password) < 19)) {
            return redirect()->back()->withinput()->with('error', 'Password Should be 6 to 18 chracter');
        }
        if ($password != $con_pass) {
            return redirect()->back()->withinput()->with('error', 'Password Does not match');
        }

        $user = Sentinel::register($request->all());
        $activation = Activation::create($user);
        $role = Sentinel::findRoleBySlug('general-user');
        $role->users()->attach($user);
        if ($user) {
            Session::flash('success', 'You are Successfully Register, Now Contact With System Administrator to Active Your Account');
            return redirect()->back();
        }
        Session::flash('error', 'Something Went Wrong, Please Contact With System Administrator');
        return redirect()->back();
    }

    public function signin(Request $request)
    {
        try {

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|string|min:6|max:18',
            ]);

            if (Sentinel::authenticate($request->all())) {
                $userInfo = Employee::leftjoin('users', 'users.id', '=', 'employees.user_id')
                    ->where('users.email', $request->email)
                    ->first(['employees.id']);
                if ($userInfo) {
                    $isPresent = Attendance::whereDate('created_at', Carbon::today())
                        ->where('employee_id', $userInfo->id)->count();
                    if (!$isPresent) {
                        $data = array(
                            'employee_id' => $userInfo->id,
                            'entry_time' => Carbon::now(),
                            'office_ip' => $request->ip(),
                            'comments' => '',
                        );
                        $attendance = Attendance::create($data);
                    }
                }
                return redirect('/dashboard');
            }
            return redirect()->back()->with(['error' => "You are not register user."]);

        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        } catch (NotActivatedException $e) {
            Session::flash('error', 'You are not activate account please contact with system Admin');
            return redirect()->back();
        }
    }

    public function signOut(Request $request)
    {
        Sentinel::logout();
        return redirect('/');
    }
}
