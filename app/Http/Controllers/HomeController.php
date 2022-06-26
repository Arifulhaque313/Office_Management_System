<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\IdCart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
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

        // return view('all-id',['id_carts'=>$id_carts]);
        return view('admin_dashboard');
    }
}
