<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Models\Expenes;
use App\Models\ExpenesType;
use App\Models\Revenue;
use App\Models\RevenueType;
use App\Models\Statement;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $revenue=Revenue::sum('total');
    	$expenes=Expenes::sum('total');
    	$user=User::count();
    	return view('dashboard.dashboard',compact('revenue','expenes','user'));
    }

    public function revenues()
    {
    	$revenues=Revenue::get();
    	return view('dashboard.revenues',compact('revenues'));
    }

    public function expenes()
    {
        $expenes=Expenes::get();
        return view('dashboard.expenes',compact('expenes'));
    }

    public function statements()
    {
        $statements=Statement::get();
        return view('dashboard.statements',compact('statements'));
    }

    public function users()
    {
        $users=User::get();
        return view('dashboard.users',compact('users'));
    }

    public function currencies()
    {
        $currencies=Currency::get();
        return view('dashboard.currencies',compact('currencies'));
    }

    public function exchange_rates()
    {
        $exchange_rates=ExchangeRate::get();
        return view('dashboard.exchange_rates',compact('exchange_rates'));
    }

    public function expenes_types()
    {
        $expenes_types=ExpenesType::get();
        return view('dashboard.expenes_types',compact('expenes_types'));
    }

    public function revenue_types()
    {
        $revenue_types=RevenueType::get();
        return view('dashboard.revenue_types',compact('revenue_types'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
