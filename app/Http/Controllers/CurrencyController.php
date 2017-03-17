<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function validateCurrency($data)
    {
    	return Validator::make($data,[
    		'name'=>'required',
    		'symbol'=>'required',
    	]);
    }

    public function showAddCurrencyForm()
    {
    	return view('currencies.add');
    }

    public function add_currency(Request $request)
    {
    	$data=$request->all();
    	$validator=$this->validateCurrency($data);
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	Currency::create([
    		'name'=>$data['name'],
    		'symbol'=>$data['symbol'],
    	]);

    	return redirect('/dashboard/currencies')->with('flashMessage',['status'=>'success','message'=>'Successfully create currency.']);
    }

    public function showEditCurrencyForm($currency_id)
    {
        $currency=Currency::findOrFail($currency_id);
        return view('currencies.edit',compact('currency'));
    }

    public function edit_currency(Request $request,$currency_id)
    {
        $currency=Currency::findOrFail($currency_id);

        $data=$request->all();
        $validator=$this->validateCurrency($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $currency->update([
            'name'=>$data['name'],
            'symbol'=>$data['symbol'],
        ]);

        return redirect('/dashboard/currencies')->with('flashMessage',['status'=>'success','message'=>'Successfully update currency.']);
    }

    public function delete_currency($currency_id)
    {
        Currency::findOrFail($currency_id)->delete();
        return redirect('/dashboard/currencies')->with('flashMessage',['status'=>'success','message'=>'Successfully delete currency.']);
    }
}
