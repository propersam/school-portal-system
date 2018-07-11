<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bursar;
use App\Fee_type;
use Illuminate\Support\Facades\Validator;
use App\Level;
use App\Fee;

class BursarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $bursars = Bursar::get();
        return view('staff.bursar.list', ['bursars' => $bursars]);
    }

    public function show_all_fees()
    {
        $levels = Level::get();
        $fee_types = Fee_type::get();
        $fees = Fee::get();
        return view('forms.bursar.all_fees', ['levels' => $levels, 'fee_types' => $fee_types, 'fees' => $fees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.bursar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fee_types()
    {
        $fee_types = Fee_type::get();
        return view('forms.bursar.fee_types', ['fee_types' => $fee_types]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string'            
        ]);
    }

    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'amount' => 'required|string|max:255',
            'level_id' => 'required|string',           
            'type_id' => 'required|string'            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_type(Request $request)
    {
        $request = $request->all();
        $this->validator($request)->validate();
        $data = array("name"=>$request['name'], "description"=>$request['description']);
        $type = $this->createFeeType($data);
        return redirect("/dashboard/fee-types")->with('success', "You have successfully added a fee type.");
    }


    public function add_fee(Request $request)
    {
        $request = $request->all();
        $this->validator2($request)->validate();

        $f = Fee::where('type_id', '=', $request['type_id'])->where('level_id', '=', $request['level_id'])->first();

        $data = array("type_id"=>$request['type_id'], "level_id"=>$request['level_id'], "amount"=>$request['amount']);
        if(!$f){
            $type = $this->createFee($data);
        }else{
            $fee = Fee::find($f->id);
            $fee->amount = $request['amount'];
            $fee->save();
        }
        return redirect("/dashboard/all-fees")->with('success', "You have successfully added a fee.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    
     protected function createFeeType(array $data)
    {
       $type = Fee_type::create($data);


       return $type;
    }

     protected function createFee(array $data)
    {
       $fee = Fee::create($data);


       return $fee;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_fee_type(Request $request, $id)
    {
        $fee = Fee_type::find($id);
        $fee->name = $request['name'];
        $fee->description = $request['description'];
        $fee->save();
        return redirect("/dashboard/fee-types")->with('success', "Successfully Updated.");
    }

    public function update_fee(Request $request, $id)
    {
        $fee = Fee::find($id);
        $fee->amount = $request['amount'];
        $fee->save();
        return redirect("/dashboard/all-fees")->with('success', "Successfully Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_fee_type($id)
    {

        $fee_type = Fee_type::find($id);

        $fee_type->delete();
        return redirect("/dashboard/fee-types")->with('success', "Successfully Deleted.");
    }

    public function delete_fee($id)
    {

        $fee_type = Fee::find($id);

        $fee_type->delete();
        return redirect("/dashboard/all-fees")->with('success', "Successfully Deleted.");
    }
}
