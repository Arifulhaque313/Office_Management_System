<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PromotionLetterController extends Controller
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
        return view('promotionLetter.index', compact('employees'));
    }


    public function create_promotion_letter($id)
    {
        $user = DB::table('users')->where('users.id', $id)->first();
        $designations = DB::table('designations')->get();
        $hrs = DB::table('hr')->get();
        return view('promotionLetter.create', compact('user', 'designations', 'hrs'));
    }


    public function store(Request  $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'effective_date' => 'required',
            'from_designation' => 'required',
            'to_designation' => 'required',
            'salary' => 'required',
            'hr_id' => 'required',
        ]);

        DB::table('promotion_letter')->insert([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'effective_date' => $request->effective_date,
            'from_designation' => $request->from_designation,
            'to_designation' => $request->to_designation,
            'salary' => $request->salary,
            'hr_id' => $request->hr_id
        ]);
        return redirect()->back()->with('success', 'Promotion Letter Created');
    }


    public function all_letter()
    {
        $promotion_letters  = DB::table('promotion_letter')
            ->select(
                'promotion_letter.*',
                'users.name as employee_name',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'promotion_letter.employee_id', '=', 'users.id')
            ->join('designations', 'promotion_letter.from_designation', '=', 'designations.id')
            // ->join('designations', 'promotion_letter.to_designation', '=', 'designations.id')
            ->join('hr', 'promotion_letter.hr_id', '=', 'hr.id')
            ->orderBy('promotion_letter.id', 'desc')
            ->get();
        return  view('promotionLetter.all_letter', compact('promotion_letters'));
    }

    // view the basic template 
    public function letter_tempate()
    {
        return view('promotionLetter.letter_template');
    }


    // letter print 
    public function letter_print_selected(Request $request, $id)
    {
        $promotion_letters  = DB::table('promotion_letter')->where('promotion_letter.id', $id)
            ->select(
                'promotion_letter.*',
                'users.name as employee_name',
                'hr.hr_name',
                'designation_name'
            )
            ->join('users', 'promotion_letter.employee_id', '=', 'users.id')
            ->join('designations', 'promotion_letter.from_designation', '=', 'designations.id')
            ->join('hr', 'promotion_letter.hr_id', '=', 'hr.id')
            ->first();


        $date  = $promotion_letters->date;
        $date_date = date('d', strtotime($date)); //only date like "20"
        $date_monthName = date(' F, Y', strtotime($date)); // month name and year like "April, 2022"

        $e_date  = $promotion_letters->effective_date;
        $effective_date = date(' F, Y', strtotime($e_date));

        $employee_name = $promotion_letters->employee_name;
        $salary = $promotion_letters->salary;
        $from_designation = $promotion_letters->designation_name;
        $to_desig  = DB::table('designations')->where("id", $promotion_letters->to_designation)->select()->first(); //get the to designation  from the designations table 
        $to_designation = $to_desig->designation_name; //get only to designation name
        $hr_name = $promotion_letters->hr_name;

        $letter_body_firstpart = "Because of your hard work and good performance, IT CORNER decided to promote you from {$from_designation} to  {$to_designation}. 
        Please deposit your ID card and get the new one from HR. I am also happy to inform you that, your regular salary will be ({$salary}) BDT from {$effective_date}";

        $letter_body_secondpart = "I wish and hope you will remain and continue your hard work and dedication to IT CORNER, so I can get a chance to increase your salary and appreciate you again and again.";

        return view('promotionLetter.print_letter', compact('letter_body_firstpart', 'letter_body_secondpart', 'date_date', 'date_monthName', 'employee_name', 'hr_name'));
    }
}
