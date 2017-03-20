<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenes;
use App\Models\Revenue;
use App\Models\Statement;
use Validator;

class ReportController extends Controller
{
    public function validateStatement($data)
    {
    	return Validator::make($data,[
    		'from'=>'required',
    		'to'=>'required',
    		'net_income'=>'required|numeric',
    	]);
    }

    public function showRevenueReport()
    {
        return view('reports.revenue');
    }

    public function showExpenseReport()
    {
        return view('reports.expense');
    }

    public function showIncomeStatementReport()
    {
    	return view('reports.income-statement');
    }

    public function getRevenueReport($from,$to)
    {
        $revenues=Revenue::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
        $totalRevenue=0;
        foreach ($revenues as $revenue) {
            $totalRevenue+=$revenue->total;
        }
        return view('reports.list-revenue',compact('revenues','totalRevenue'));
    }

    public function getExpenseReport($from,$to)
    {
        $expenes=Expenes::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
        $totalExpenes=0;
        foreach ($expenes as $expene) {
            $totalExpenes+=$expene->total;
        }
        return view('reports.list-expense',compact('expenes','totalExpenes'));
    }

    public function getIncomeStatementReport($from,$to)
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
        return view('reports.list-income-statement',compact('revenues','totalRevenue','expenes','totalExpenes'));
    }

    public function storeIncomeStatement(Request $request)
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

    public function printReport($report,$from,$to){
        if($report==='revenue'){
            $title="Revenue Report";
            $revenues=Revenue::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
            $totalRevenue=0;
            foreach ($revenues as $revenue) {
                $totalRevenue+=$revenue->total;
            }
            return view('reports.print-revenue',compact('title','revenues','totalRevenue'));
        }else if($report==='expense'){
            $title="Expense Report";
            $expenses=Expenes::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
            $totalExpense=0;
            foreach ($expenses as $expense) {
                $totalExpense+=$expense->total;
            }
            return view('reports.print-expense',compact('title','expenses','totalExpense'));
        }else if($report==='income-statement'){
            $title="Income Statement Report";
            $revenues=Revenue::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
            $totalRevenue=0;
            foreach ($revenues as $revenue) {
                $totalRevenue+=$revenue->total;
            }

            $expenses=Expenes::whereRaw('date(`created_at`) BETWEEN \''.$from.'\' AND \''.$to.'\'')->get();
            $totalExpense=0;
            foreach ($expenses as $expense) {
                $totalExpense+=$expense->total;
            }
            return view('reports.print-income-statement',compact('title','revenues','totalRevenue','expenses','totalExpense'));       
        }
    }
}
