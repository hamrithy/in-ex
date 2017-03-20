<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RevenueType;
use Validator;

class RevenueTypeController extends Controller
{
    public function validateRevenueType($data)
    {
    	return Validator::make($data,[
    		'type'=>'required',
    	]);
    }

    public function showAddRevenueTypeForm()
    {
    	return view('revenue_types.add');
    }

    public function add_revenue_type(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateRevenueType($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	RevenueType::create([
    		'type'=>$data['type'],
    		'note'=>$data['note'],
    	]);

    	return redirect('/setup-data/revenue-type')->with('flashMessage',['status'=>'success','message'=>'Successfully create revenue type.']);
    }

    public function showEditRevenueTypeForm($revenue_type_id)
    {
        $revenue_type=RevenueType::findOrFail($revenue_type_id);
        return view('revenue_types.edit',compact('revenue_type'));
    }

    public function edit_revenue_type(Request $request,$revenue_type_id)
    {
        $revenue_type=RevenueType::findOrFail($revenue_type_id);

        $data=$request->all();
        $validator=$this->validateRevenueType($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $revenue_type->update([
            'type'=>$data['type'],
            'note'=>$data['note'],
        ]);

        return redirect('/setup-data/revenue-type')->with('flashMessage',['status'=>'success','message'=>'Successfully update revenue type.']);
    }

    public function delete_revenue_type($revenue_type_id)
    {
        RevenueType::findOrFail($revenue_type_id)->delete();
        return redirect('/setup-data/revenue-type')->with('flashMessage',['status'=>'success','message'=>'Successfully delete revenue type.']);
    }
}
