<?php

namespace Modules\Account\Http\Controllers;

use App\Libraries\Encryption;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Account\Entities\OfficeAccount;

class AccountController extends Controller
{
    use  ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('account::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('account::create');
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
        return view('account::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('account::edit');
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

    public function account(){
        return view('account::account');
    }

    /**
     * Cost Store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */

    public function costStore(Request $request){
        try{
            $this->validate($request,[
                'cost_title' => 'required|min:2',
                'cost_details' => 'required|min:2',
                'cost_amount' => 'required|numeric'
            ]);

            DB::beginTransaction();
               $objOffAct = new OfficeAccount();
               $objOffAct->office_id = 1;
               $objOffAct->cost_title = $request->cost_title;
               $objOffAct->cost_details = $request->cost_details;
               $objOffAct->cost_amount = $request->cost_amount;
               $objOffAct->save();
            DB::commit();
            return redirect()->back()->with('success','Successfully Cost Stored');
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function dailyAccount(){
      return view('account::daily_account');
    }

    public function costEdit(Request $request){
        try{
            $data = [
                'responseCode' => 0,
            ];
            $id = Encryption::decodeId($request->get('cost_id'));
            $dataById = OfficeAccount::find($id);
            $mode = $request->get('mode');
            if($mode == 'view'){
                $html_page = strval(view('account::modal.view-modal',compact('dataById')));
            }else{
                $html_page = strval(view('account::modal.edit-modal',compact('dataById')));
            }
            if($html_page){
                $data = [
                    'responseCode' => 1,
                    'html' => $html_page,
                    ];
            }
        }catch (\Exception $e){

        }
        return response()->json($data);
    }

    public function costUpdate(Request $request,$id){
        try{
            $this->validate($request,[
                'cost_title' => 'required|min:2',
                'cost_details' => 'required|min:2',
                'cost_amount' => 'required|numeric'
            ]);
            $id = Encryption::decodeId($id);
            DB::beginTransaction();
            OfficeAccount::where('id',$id)->update([
                'cost_title' => $request->cost_title,
                'cost_details' => $request->cost_details,
                'cost_amount' => $request->cost_amount,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Successfully Cost Updated');
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
        }

    }
}
