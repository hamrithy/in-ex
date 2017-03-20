<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Revenue;
use App\Models\RevenueType;
use Validator;

class RevenueController extends Controller
{
   	public function validateRevenue($data)
    {
    	return Validator::make($data,[
            'date'=>'required|date',
    		'reference_no'=>'required',
    		'revenue_type_id'=>'required|exists:revenue_types,id',
    		'price'=>'required|numeric|between:0,9999999999.99',
    		'exchange_rate'=>'required|numeric|between:0,9999999999.99',
    		'currency'=>'required|in:KHR,THB,USD',
    	]);
    }

    public function showAddRevenueForm()
    {
    	$revenue_types=RevenueType::pluck('type','id');
    	$currencies=Currency::getCurrencies();
    	return view('revenues.add',compact('revenue_types','currencies'));
    }

    public function add_revenue(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateRevenue($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	Revenue::create([
            'date'=>$data['date'],
    		'reference_no'=>$data['reference_no'],
    		'revenue_type_id'=>$data['revenue_type_id'],
    		'currency'=>$data['currency'],
    		'price'=>$data['price'],
    		'exchange_rate'=>$data['exchange_rate'],
    		'total'=>round($data['price']/$data['exchange_rate'],2),
    	]);

    	return redirect('/dashboard/revenues')->with('flashMessage',['status'=>'success','message'=>'Successfully create revenue.']);
    }

    public function showEditRevenueForm($revenue_id)
    {
        $revenue=Revenue::findOrFail($revenue_id);
        $revenue_types=RevenueType::pluck('type','id');
    	$currencies=Currency::getCurrencies();
    	return view('revenues.edit',compact('revenue','revenue_types','currencies'));
    }

    public function edit_revenue(Request $request,$revenue_id)
    {
        $revenue=Revenue::findOrFail($revenue_id);

        $data=$request->all();
        $validator=$this->validateRevenue($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $revenue->update([
            'date'=>$data['date'],
            'reference_no'=>$data['reference_no'],
    		'revenue_type_id'=>$data['revenue_type_id'],
    		'currency'=>$data['currency'],
    		'price'=>$data['price'],
    		'exchange_rate'=>$data['exchange_rate'],
    		'total'=>round($data['price']/$data['exchange_rate'],2),
        ]);

        return redirect('/dashboard/revenues')->with('flashMessage',['status'=>'success','message'=>'Successfully update revenue.']);
    }

    public function delete_revenue($revenue_id)
    {
        Revenue::findOrFail($revenue_id)->delete();
        return redirect('/dashboard/revenues')->with('flashMessage',['status'=>'success','message'=>'Successfully delete revenue.']);
    }
}
