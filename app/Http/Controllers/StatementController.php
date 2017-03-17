<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenes;
use App\Models\Revenue;
use App\Models\Statement;
use Validator;

class StatementController extends Controller
{
    public function validateStatement($data)
    {
    	return Validator::make($data,[
    		'from'=>'required',
    		'to'=>'required',
    		'net_income'=>'required|numeric',
    	]);
    }

    public function showAddStatementForm()
    {
    	return view('statements.add');
    }

    public function getStatement($from,$to)
    {
        $revenues=Revenue::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
        $totalRevenue=0;
        foreach ($revenues as $revenue) {
            $totalRevenue+=$revenue->total;
        }

        $expenes=Expenes::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
        $totalExpenes=0;
        foreach ($expenes as $expene) {
            $totalExpenes+=$expene->total;
        }
        return view('statements.list',compact('revenues','totalRevenue','expenes','totalExpenes'));
    }

    public function add_statement(Request $request)
    {
        $data=$request->all();
        $validator=$this->validateStatement($data);
        if ($validator->fails()) {
            return json_encode(['status'=>'error','message'=>'Failed to save statement.','className'=>'alert-danger']);
        }
        Statement::create([
            'from'=>$data['from'],
            'to'=>$data['to'],
            'net_income'=>$data['net_income'],
        ]);
        return json_encode(['status'=>'success','message'=>'Succefully save statement.','className'=>'alert-success']);
    }
}
