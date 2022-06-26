<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class InternLetterController extends Controller
{

    public function index()
    {
        $employees = DB::table('users')->where('employee_type', '=', 'intern')->select(
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
        return view('intern_letter.index', compact('employees'));
    }


    public function create($id)
    {
        $user = DB::table('users')->where('users.id', $id)->first();
        $designations = DB::table('designations')->where('designations.id', '=', $user->designation_id)->first();
        $hrs = DB::table('hr')->get();
        return view('intern_letter.create', compact('user', 'designations', 'hrs'));
    }


    public function store(Request  $request)
    {

        $validated = $request->validate([
            'date' => 'required',
            'effective_date' => 'required',
            'designation' => 'required',
            'salary' => 'required',
            'hr_id' => 'required',
        ]);

        DB::table('intern_letter')->insert([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'effective_date' => $request->effective_date,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'hr_id' => $request->hr_id
        ]);
        return redirect()->back()->with('success', 'intern Letter Created');
    }


    public function all_letter()
    {
        $intern_letters  = DB::table('intern_letter')
            ->select(
                'intern_letter.*',
                'users.name as employee_name',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'intern_letter.employee_id', '=', 'users.id')
            ->join('designations', 'intern_letter.designation', '=', 'designations.id')
            ->join('hr', 'intern_letter.hr_id', '=', 'hr.id')
            ->orderBy('intern_letter.id', 'desc')
            ->get();
        return  view('intern_letter.all_letter', compact('intern_letters'));
    }


    public function letter_print_selected($id)
    {
        $intern_letters  = DB::table('intern_letter')->where('intern_letter.id', $id)
            ->select(
                'intern_letter.*',
                'users.name as employee_name',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'intern_letter.employee_id', '=', 'users.id')
            ->join('designations', 'intern_letter.designation', '=', 'designations.id')
            ->join('hr', 'intern_letter.hr_id', '=', 'hr.id')
            ->first();

        $date  = $intern_letters->date;
        $date_date = date('d', strtotime($date)); //only date like "20"
        $date_monthName = date(' F, Y', strtotime($date)); // month name and year like "April, 2022"

        $e_date  = $intern_letters->effective_date;
        $edate_date = date('d', strtotime($date)); //only date like "20"
        $edate_monthName = date(' F, Y', strtotime($date));  // month name and year like "April, 2022"

        $employee_name = $intern_letters->employee_name;
        $salary = $intern_letters->salary;
        $designation = $intern_letters->designation_name;
        $hr_name = $intern_letters->hr_name;

        $letter_body_firstpart = "We are pleased to offer you an  internship with IT CORNER for a period of  three  months. You will be provided an honorarium of taka ({$salary}) per month. you should note that any  information and  data collected from you during internship should be kept confidential  at all the time. You can  join from  {$edate_date}<sup>th</sup> 
        {$edate_monthName}";

        $letter_body_secondpart = "Congratulations and we look forward to  working  with  you.";

        return view('intern_letter.print_letter', compact('letter_body_firstpart', 'letter_body_secondpart', 'date_date', 'date_monthName', 'employee_name', 'hr_name'));
    }
}
