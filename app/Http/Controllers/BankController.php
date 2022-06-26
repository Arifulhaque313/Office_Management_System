<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    // bank methods 
    public function add_bank()
    {
        return view('bank.bank_create');
    }

    public function bank_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        DB::table('bank')->insert([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Bank Added Successfully');
    }


    // branch methods 
    public function add_branch()
    {
        $banks = DB::table('bank')->get();
        return view('bank.branch_create', compact('banks'));
    }

    public function branch_store(Request $request)
    {
        $validated = $request->validate([
            'bank_id' => 'required',
            'name' => 'required',
        ]);

        DB::table('branch')->insert([
            'bank_id' => $request->bank_id,
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Branch Added Successfully');
    }
}
