<?php

namespace Modules\User\Http\Controllers;

use App\Libraries\Encryption;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Contracts\DataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
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
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('user::edit');
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


    public function allUser(){
        // return "jim";
        return view('user::all-user');
    }

    public function getList(){
        $allUserList = User::all();
        Datatable::of($allUserList)->make(ture);
    }
    public function statusChangeUser($id){
        $id = Encryption::decodeid($id);
        $isActive = Activation::where('user_id',$id)->first();
        if($isActive && $isActive->completed){
            return redirect()->back()->with('success','Allready Active This User');
        }
        $activeUser = $this->activate($id,$isActive->code);
        if(!$activeUser){

        }
        return redirect()->back()->with('success','This user is active Now');
    }

    private function activate($id,$code){
        $user = User::whereId($id)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if(Activation::complete($sentinelUser,$code)){
            return true;
        }
        return false;

    }
}
