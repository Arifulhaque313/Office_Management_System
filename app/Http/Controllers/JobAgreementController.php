<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobAgreementController extends Controller
{

    public function index()
    {
        $employees = DB::table('users')->where('employee_type', '=', 'permanent')->select(
            'users.id',
            'users.name',
            'users.email',
            'users.mobile',
            'users.employee_type',
            'designations.id as designation_id',
            'designations.designation_name'
        )
            ->join('designations', 'users.designation_id', '=', 'designations.id')->orderBy('users.id', 'desc')
            ->paginate(5);
        return view('job_agreement.index', compact('employees'));
    }


    public  function create($id)
    {
        $user = DB::table('users')->where('users.id', $id)->first();
        $designations = DB::table('designations')->get();
        $hrs = DB::table('hr')->get();
        return view('job_agreement.create', compact('user', 'designations', 'hrs'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'employee_id' => 'required|string|max:50|unique:job_agreement,employee_id',
            'date' => 'required',
            'designation_id' => 'required',
            'month1' => 'required',
            'month2' => 'required',
            'month3' => 'required',
            'salary1' => 'required',
            'salary2' => 'required',
            'salary3' => 'required',
            'regular_salary' => 'required',
            'hr_id' => 'required',

        ]);
        DB::table('job_agreement')->insert([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'designation_id' => $request->designation_id,
            'month1' => $request->month1,
            'salary1' => $request->salary1,
            'month2' => $request->month2,
            'salary2' => $request->salary2,
            'month3' => $request->month3,
            'salary3' => $request->salary3,
            'regular_salary' => $request->regular_salary,
            'hr_id' => $request->hr_id,

        ]);
        return redirect()->back()->with('success', 'job Agreement Created');
    }


    public function all_agreement()
    {
        $job_agreements  = DB::table('job_agreement')
            ->select(
                'job_agreement.*',
                'users.name as employee_name',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'job_agreement.employee_id', '=', 'users.id')
            ->join('designations', 'job_agreement.designation_id', '=', 'designations.id')
            ->join('hr', 'job_agreement.hr_id', '=', 'hr.id')
            ->orderBy('job_agreement.id', 'desc')
            ->get();

        return view('job_agreement.all_agreement', compact('job_agreements'));
    }


    public function agreement_print_selected($id)
    {
        $job_agreement  = DB::table('job_agreement')->where('job_agreement.employee_id', $id)
            ->select(
                'job_agreement.*',
                'users.name as employee_name',
                'users.*',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'job_agreement.employee_id', '=', 'users.id')
            ->join('designations', 'job_agreement.designation_id', '=', 'designations.id')
            ->join('hr', 'job_agreement.hr_id', '=', 'hr.id')
            ->first();


        $date  = $job_agreement->date;
        $date_date = date('d', strtotime($date)); //only date like "20"
        $date_monthName = date(' F, Y', strtotime($date)); // month name and year like "April, 2022"

        $month1 = $job_agreement->month1;
        $month1_monthName = date(' F, Y', strtotime($month1));

        $month2 = $job_agreement->month2;
        $month2_monthName = date(' F, Y', strtotime($month2));

        $month3 = $job_agreement->month3;
        $month3_monthName = date(' F, Y', strtotime($month3));


        $employee_name = $job_agreement->employee_name;

        $designation = $job_agreement->designation_name;
        $hr_name = $job_agreement->hr_name;

        return view('job_agreement.print', compact('job_agreement', 'date_date', 'date_monthName', 'employee_name', 'designation', 'hr_name', 'month1_monthName', 'month2_monthName', 'month3_monthName'));
    }
}
