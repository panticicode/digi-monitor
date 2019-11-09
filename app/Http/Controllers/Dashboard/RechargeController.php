<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RechargeController extends Controller
{
    public function showRecharge()
    {   
        $user = \Auth::user();

        return view('dashboard.recharge.show', [
            'user' => $user
        ]);
    }

    public function changeRecharge(Request $request)
    {
        $request->validate([
            'balance' => 'required|gte:0.50'
        ]);
        
        $user = \Auth::user();
            
        try {
            $response = $user->charge($request->balance*100, ['source' => $request->stripeToken]);
            $user->balance = $user->balance + $request->balance*100;
        } catch (Exception $e) {
            session()->flash('danger', 'Error my card:'.$e);
            return redirect()->back();
        }
        
        $user->save();

        session()->flash('success', 'You have been success payment');

        return redirect()->back();
    }
}
