<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenesType;
use App\Models\Expenes;
use App\Models\Currency;
use Validator;

class ExpenesController extends Controller
{
    public function validateExpenes($data)
    {
    	return Validator::make($data,[
            'date'=>'required|date',
    		'reference_no'=>'required',
    		'expenes_type_id'=>'required|exists:expenes_types,id',
    		'price'=>'required|numeric|between:0,9999999999.99',
    		'exchange_rate'=>'required|numeric|between:0,9999999999.99',
    		'currency'=>'required|in:KHR,THB,USD',
    	]);
    }

    public function showAddExpenesForm()
    {
    	$expenes_types=ExpenesType::pluck('type','id');
    	$currencies=Currency::getCurrencies();
    	return view('expenes.add',compact('expenes_types','currencies'));
    }

    public function add_expenes(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateExpenes($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	Expenes::create([
            'date'=>$data['date'],
    		'reference_no'=>$data['reference_no'],
    		'expenes_type_id'=>$data['expenes_type_id'],
    		'currency'=>$data['currency'],
    		'price'=>$data['price'],
    		'exchange_rate'=>$data['exchange_rate'],
    		'total'=>round($data['price']/$data['exchange_rate'],2),
    	]);

    	return redirect('/post-data/expense')->with('flashMessage',['status'=>'success','message'=>'Successfully create expense.']);
    }

    public function showEditExpenesForm($expenes_id)
    {
        $expenes=Expenes::findOrFail($expenes_id);
        $expenes_types=ExpenesType::pluck('type','id');
    	$currencies=Currency::getCurrencies();
    	return view('expenes.edit',compact('expenes','expenes_types','currencies'));
    }

    public function edit_expenes(Request $request,$expenes_id)
    {
        $expenes=Expenes::findOrFail($expenes_id);

        $data=$request->all();
        $validator=$this->validateExpenes($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expenes->update([
            'date'=>$data['date'],
            'reference_no'=>$data['reference_no'],
    		'expenes_type_id'=>$data['expenes_type_id'],
    		'currency'=>$data['currency'],
    		'price'=>$data['price'],
    		'exchange_rate'=>$data['exchange_rate'],
    		'total'=>round($data['price']/$data['exchange_rate'],2),
        ]);

        return redirect('/post-data/expense')->with('flashMessage',['status'=>'success','message'=>'Successfully update expense.']);
    }

    public function delete_expenes($expenes_id)
    {
        Expenes::findOrFail($expenes_id)->delete();
        return redirect('/post-data/expense')->with('flashMessage',['status'=>'success','message'=>'Successfully delete expense.']);
    }
}
