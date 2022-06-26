<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalarySheetController extends Controller
{
    public function salary_acceptance()
    {
        $employees = DB::select('select * from salary INNER JOIN users  
        ON salary.employee_id = users.id where MONTH(fund_date) = MONTH(NOW()) AND YEAR(fund_date)=YEAR(NOW());');
        return view('salary_sheet.salary_acceptance', compact('employees'));
    }


    public function salary_sheet_for_bank()
    {
        $employees = DB::select('select * from salary INNER JOIN users  
        ON salary.employee_id = users.id where MONTH(fund_date) = MONTH(NOW()) AND YEAR(fund_date)=YEAR(NOW());');
        return view('salary_sheet.salary_sheet_for_bank', compact('employees'));
    }



    // public function salary_sheet_for_bank()
    // {
    //     $employees = DB::table('users')->select(
    //         'users.id',
    //         'users.name',
    //         'users.email',
    //         'users.mobile',
    //         'users.employee_type',
    //         'users.status',
    //         'salary.*'
    //     )->join('salary', 'users.id', '=', 'salary.employee_id')->get();
    //     return view('salary_sheet.salary_sheet_for_bank', compact('employees'));
    // }



























    // public function salary_acceptance()
    // {
    //     $employees = DB::table('salary')->select(
    //         'users.id',
    //         'users.name',
    //         'users.email',
    //         'users.mobile',
    //         'users.employee_type',
    //         'users.status',
    //         'salary.*'
    //     )->join('users', 'users.id', '=', 'salary.employee_id')->distinct()->get();
    //     return view('salary_sheet.salary_acceptance', compact('employees'));
    // }
}
