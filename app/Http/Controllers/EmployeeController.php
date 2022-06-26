<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function  index()
    {
        $employees = DB::table('users')->select(
            'users.id',
            'users.name',
            'users.email',
            'users.mobile',
            'users.employee_type',
            'users.status',
            'designations.id as designation_id',
            'designations.designation_name',
        )
            ->join('designations', 'users.designation_id', '=', 'designations.id')->orderBy('users.id', 'desc')
            ->paginate(5);;
        return view('employees.index', ['employees' => $employees]);
    }

    public function  create()
    {
        $designations = Designation::all();
        $banks = DB::table('bank')->get();
        // dd($designation);
        return view('employees.create', compact('designations', 'banks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            "father_name" => 'required',
            "mother_name" => 'required',
            "address" => 'required',
            'mobile' => 'required|numeric|min:11',
            'nid' => 'required|numeric',
            'password' => 'required|min:6|max:50|confirmed',
            'employee_type' => 'required',
            'designation_id' => 'required',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            "father_name" => $request->father_name,
            "mother_name" => $request->mother_name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'nid' => $request->nid,
            'password' => Hash::make($request->password),
            'employee_type' => $request->employee_type,
            'designation_id' => $request->designation_id,
        ]);

        $id = DB::getPdo()->lastInsertId();
        if (!empty($request->account_number) && !empty($request->bank_id)) {
            DB::table('bank_account')->insert([
                'employee_id' => $id,
                'account_number' => $request->account_number,
                'bank_id' => $request->bank_id,
            ]);
        } else {
            DB::table('bank_account')->insert([
                'employee_id' => $id,
                'account_number' => NULL,
                'bank_id' => NULL,
            ]);
        }
        return redirect()->back()->with('success', 'Employee Added');
    }


    public function edit($id)
    {
        $employee = DB::table('users')->where('id', '=', $id)->first();
        $employee_designation = DB::table('designations')->where('id', '=', $employee->designation_id)->first();
        $designations = DB::table('designations')->get();
        $banks = DB::table('bank')->get();
        $bank_account = DB::table('bank_account')->where('employee_id', '=', $id)->select(
            'bank_account.*',
            'bank.name as bankname',
            'bank.*',
            'branch.*',
            'branch.name as branchname',
        )->join('bank', 'bank_account.bank_id', '=', 'bank.id')
            ->join('branch', 'bank.id', '=', 'branch.bank_id')->first();
        // dd($bank_account->bankname, $bank_account->branchname);

        return view('employees.edit', compact('employee', 'employee_designation', 'designations', 'banks', 'bank_account'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            "father_name" => 'required',
            "mother_name" => 'required',
            "address" => 'required',
            'mobile' => 'required|numeric|min:11',
            'nid' => 'required|numeric',
            'employee_type' => 'required',
            'designation_id' => 'required',
        ]);
        // return response()->json($request->active);
        if ($request->status == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        // dd($status);
        DB::table('users')->where('id', '=', $id)->update([
            'name' => $request->name,
            "father_name" => $request->father_name,
            "mother_name" => $request->mother_name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'nid' => $request->nid,
            'employee_type' => $request->employee_type,
            'designation_id' => $request->designation_id,
            'status' => $status
        ]);

        if (!empty($request->account_number) && !empty($request->bank_id)) {
            DB::table('bank_account')->where('employee_id', '=', $id)->update([
                'account_number' => $request->account_number,
                'bank_id' => $request->bank_id,
            ]);
        }
        return redirect()->back()->with('success', 'Update successfull');
    }


    public  function destroy(Request $request)
    {
        if ($request->ajax()) {
            $user = DB::table('users')->where('id', '=', $request->id)->delete();
            return response()->json($user);
        }
    }

    // salary methods  
    public function add_salary()
    {
        $employees = DB::table('users')->join('designations', 'users.designation_id', '=', 'designations.id')->orderBy('users.id', 'desc')->get();
        return view('employees.create_basic_salary', compact('employees'));
    }

    public function store_salary(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'salary_ammount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // checking basic salary already exist or not  
        $get_employee = DB::table('basic_salary')->where('employee_id', '=', $request->employee_id)->where('status', '=', 1)->get();
        // if exist then update the status 
        if ($get_employee) {
            DB::table('basic_salary')->where('employee_id', '=', $request->employee_id)->where('status', '=', 1)->update([
                'status' => 0
            ]);
        }

        DB::table('basic_salary')->insert([
            'employee_id' => $request->employee_id,
            'salary_ammount' => $request->salary_ammount,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
        ]);
        return redirect()->back()->with('success', 'Basic Salary Added successfully');
    }



    public function create_pay_salary()
    {
        $employees = DB::table('users')->where('status', '=', 1)->orderBy('users.id', 'desc')->get();
        return view('employees.create_pay_salary', compact('employees'));
    }


    // ajax call from create pay Salary  
    public function get_bank_account(Request $request)
    {
        $bank_account = DB::table('bank_account')->where('employee_id', '=', $request->employee_id)->where('status', 1)->first();
        $basic_salary = DB::table('basic_salary')->where('employee_id', '=', $request->employee_id)->where('status', 1)->first();
        $data = [
            'bank_account' => isset($bank_account->account_number) ? $bank_account->account_number : "",
            'basic_salary' =>  $basic_salary->salary_ammount
        ];
        return response()->json($data);
    }

    public function store_pay_salary(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'fund_date' => 'required',
        ]);


        // $fetch_employee_row = DB::table('salary')->where('employee_id', '=', $request->employee_id)->get();
        // foreach ($fetch_employee_row as $f) {
        //     echo $f->fund_date;
        // }



        DB::table('salary')->insert([
            'employee_id' => $request->employee_id,
            'basic_salary' => $request->basic_salary,
            "bank_account" => $request->bank_account,
            "fund_date" => $request->fund_date,
        ]);
        return redirect()->back()->with('success', 'Pay Salary Added successfully');
    }
}
