<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoiningYear;
use App\Models\BirthYear;
use App\Models\Designation;
use App\Models\Office;
use App\Models\IdCart;
use App\Http\Controllers\Upload\ItUpload;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\File;
use DateTime;
use PDF;
use Dompdf\Options;
// use \Mpdf\Mpdf as PDF; 
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function id_cart()
    {
        $joining_year   = JoiningYear::select()->get();
        $designation     = Designation::select()->get();
        $office     = Office::select()->get();
        return view("id-cart", [
            'joining_years' => $joining_year,
            'designations' => $designation,
            'offices' => $office
        ]);
    }
    /*******************************************
     * function for store id cart to database
     **********************************************/
    public function store(Request $request)
    {
        $validationRules = [
            'name' => 'required|max:20|min:2',
            'id_no' => 'required|numeric|digits:2|regex:/\d{2}/',
            'email' => 'required|unique:id_carts|email',
            'date_of_birth' => 'required',
            'image' => 'required|',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
            'expired_date' => 'required',
            'joining_date' => 'required',
            'blood_group' => 'required',
        ];
        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();;
        } else {
            //upload an employee photo
            if ($request->file()) {
                $fileName = time() . '_' . $request->image->getClientOriginalName();
                $filePath = $request->file('image')->move(public_path('/images'), $fileName);
                $photo  = 'images/' . $fileName;
            } //eding upload operation
            $id_cart = new IdCart();
            $id_cart->name = $request->name;
            $id_cart->date_of_birth = $request->date_of_birth;
            $id_cart->designation_id = $request->designation;
            $id_cart->office_id = $request->office;
            $id_cart->id_no = $request->id_no;
            $id_cart->email = $request->email;
            $id_cart->photo = $photo;
            $id_cart->expired_date = $request->expired_date;
            $id_cart->joining_date = $request->joining_date;
            $id_cart->blood_group = $request->blood_group;
            // $id_cart->photo = '';
            if ($id_cart->save()) {
                return redirect()->route('print');
            } else {
                return redirect()->back()->withErrors(['error' => "Somthing went wrong! Please try again later"]);
            }
        }
    }
    public function print()
    {
        $id_carts = IdCart::select(
            'id_carts.name',
            'id_carts.email',
            'id_carts.date_of_birth',
            'id_carts.photo',
            'designations.designation_id',
            'designations.designation_name',
            'offices.office_name',
            'offices.office_id',
            'id_carts.joining_date',
            'id_carts.expired_date',
            'offices.address',
            'offices.address_line_2',
            'id_carts.blood_group',
            'id_carts.id_no'
        )
            ->join('designations', 'id_carts.designation_id', '=', 'designations.id')
            ->join('offices', 'id_carts.office_id', '=', 'offices.id')
            ->orderBy('id_carts.id', 'desc')
            ->first();
        // generate id not
        $joinig_obj = new \DateTime();
        $joining_date = $id_carts->joining_date;
        $joinig_obj->createFromFormat('dmy', $joining_date);
        $joining_2 = substr($joinig_obj->format('Y'), -2); //2 digit of joining year

        $date_of_birth = $id_carts->date_of_birth;
        $dateObj = new \DateTime();
        $dateObj->createFromFormat('dmy', $date_of_birth);
        $birth_2 = substr($dateObj->format('Y'), -2); //2 digit of birth year
        return $birth_2;
        $designation_code = $id_carts->designation_id; //designation code
        $office_code = $id_carts->office_id;
        $id_no = $id_carts->id_no;
        $id = $joining_2 . $birth_2 . $designation_code . $office_code . $id_no;

        return view('print-id-cart', ['id_carts' => $id_carts, 'id' => $id, 'pdf' => "test the page"]);
    }
    public function print_selected(Request $request, $id)
    {
        $id_carts = IdCart::where('id_carts.id', $id)->select(
            'id_carts.name',
            'id_carts.email',
            'id_carts.date_of_birth',
            'id_carts.photo',
            'id_carts.id',
            'designations.designation_id',
            'designations.designation_name',
            'offices.office_name',
            'offices.office_id',
            'id_carts.joining_date',
            'id_carts.expired_date',
            'offices.address',
            'offices.address_line_2',
            'id_carts.blood_group',
            'id_carts.id_no'
        )
            ->join('designations', 'id_carts.designation_id', '=', 'designations.id')
            ->join('offices', 'id_carts.office_id', '=', 'offices.id')
            ->orderBy('id_carts.id', 'desc')
            ->first();
        // generate id not
        $joinig_obj = new \DateTime();
        $joining_date = $id_carts->joining_date;
        $joinig_obj->createFromFormat('dmy', $joining_date);
        $joining_2 = substr($joinig_obj->format('Y'), -2); //2 digit of joining year


        $date_of_birth = $id_carts->date_of_birth;
        // $dateObj = ;
        // $dateObj->createFromFormat('dmy', $date_of_birth);
        $birth_2 = substr(date('Y', strtotime($date_of_birth)), -2); //2 digit of birth year
        $designation_code = $id_carts->designation_id; //designation code
        $office_code = $id_carts->office_id;
        $id_no = $id_carts->id_no;
        $id = $joining_2 . $birth_2 . $designation_code . $office_code . $id_no;

        return view('print-id-cart', ['id_carts' => $id_carts, 'id' => $id, 'pdf' => "test the page"]);
    }
    public function all_id()
    {
        // $id_carts = IdCart::select()->paginate(3);
        $id_carts = IdCart::select(
            'id_carts.name',
            'id_carts.email',
            'id_carts.date_of_birth',
            'id_carts.photo',
            'id_carts.id as emp_id',
            'designations.designation_id',
            'designations.designation_name',
            'offices.office_name',
            'offices.office_id',
            'id_carts.joining_date',
            'id_carts.expired_date',
            'offices.address',
            'offices.address_line_2',
            'id_carts.blood_group',
            'id_carts.id_no'
        )
            ->join('designations', 'id_carts.designation_id', '=', 'designations.id')
            ->join('offices', 'id_carts.office_id', '=', 'offices.id')
            ->orderBy('id_carts.id', 'desc')
            ->paginate(5);
        // generate id not

        return view('all-id', ['id_carts' => $id_carts]);
    }
}
