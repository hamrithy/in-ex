<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenesType;
use Validator;

class ExpenesTypeController extends Controller
{
    public function validateExpenesType($data)
    {
    	return Validator::make($data,[
    		'type'=>'required',
    	]);
    }

    public function showAddExpenesTypeForm()
    {
    	return view('expenes_types.add');
    }

    public function add_expenes_type(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateExpenesType($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	ExpenesType::create([
    		'type'=>$data['type'],
    		'note'=>$data['note'],
    	]);

    	return redirect('/dashboard/expenes-types')->with('flashMessage',['status'=>'success','message'=>'Successfully create expenes type.']);
    }

    public function showEditExpenesTypeForm($expenes_type_id)
    {
        $expenes_type=ExpenesType::findOrFail($expenes_type_id);
        return view('expenes_types.edit',compact('expenes_type'));
    }

    public function edit_expenes_type(Request $request,$expenes_type_id)
    {
        $expenes_type=ExpenesType::findOrFail($expenes_type_id);

        $data=$request->all();
        $validator=$this->validateExpenesType($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expenes_type->update([
            'type'=>$data['type'],
            'note'=>$data['note'],
        ]);

        return redirect('/dashboard/expenes-types')->with('flashMessage',['status'=>'success','message'=>'Successfully update expenes type.']);
    }

    public function delete_expenes_type($expenes_type_id)
    {
        ExpenesType::findOrFail($expenes_type_id)->delete();
        return redirect('/dashboard/expenes-types')->with('flashMessage',['status'=>'success','message'=>'Successfully delete expenes type.']);
    }
}
