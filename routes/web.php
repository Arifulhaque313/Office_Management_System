<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PromotionLetterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InternLetterController;
use App\Http\Controllers\JobAgreementController;
use App\Http\Controllers\SalarySheetController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/office-create', [OfficeController::class, 'create'])->name('office.create');
    Route::post('/office-add', [OfficeController::class, 'add'])->name('office.add');

    // all cardControllers routes 
    Route::get('/print-id-cart', [CartController::class, 'print'])->name('print');
    Route::get('/print-id-cart/select/{id}', [CartController::class, 'print_selected'])->name('print-selected'); //print select id cart
    Route::get('/create-id-cart', [CartController::class, 'id_cart'])->name('id-cart');
    Route::post('/create-id-cart', [CartController::class, 'store'])->name('id-cart');
    Route::post('/create-id-cart', [CartController::class, 'store'])->name('id-cart');
    Route::get('/all-id-carts', [CartController::class, 'all_id'])->name('all-id-carts'); //all id carts view

    // all EmployeeControllers routes 
    Route::get('/all-employee', [EmployeeController::class, 'index'])->name('all.employee');
    Route::get('/create-employee', [EmployeeController::class, 'create'])->name('create.employee');
    Route::post('/store-employee', [EmployeeController::class, 'store'])->name('store.employee');
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit.employee');
    Route::post('/update-employee/{id}', [EmployeeController::class, 'update'])->name('update.employee');
    Route::get('/delete-employee', [EmployeeController::class, 'destroy'])->name('destroy.employee');
    // add basic salary 
    Route::get('/add-basic-salary', [EmployeeController::class, 'add_salary'])->name('add.salary');
    Route::post('/store-basic-salary', [EmployeeController::class, 'store_salary'])->name('store.salary');
    Route::get('/add-pay-salary', [EmployeeController::class, 'create_pay_salary'])->name('pay.salary');
    Route::post('/store-pay-salary', [EmployeeController::class, 'store_pay_salary'])->name('store_pay.salary');
    // information for create pay salary ajax route 
    Route::get('/get-bank-account', [EmployeeController::class, 'get_bank_account']);

    // all promotionLetterController routes 
    Route::get('/promotion-letter', [PromotionLetterController::class, 'index'])->name('promotion-letter.index');
    Route::post('/create-promotion-letter/store', [PromotionLetterController::class, 'store'])->name('promotion-letter.store');
    Route::get('/create-promotion_letter/{id}', [PromotionLetterController::class, 'create_promotion_letter'])->name('create.promotionLetter');
    Route::get('/all-letter', [PromotionLetterController::class, 'all_letter'])->name('all.letter');
    Route::get('/letter-template', [PromotionLetterController::class, 'letter_tempate'])->name('letter_template');
    Route::get('/print-promotion-letter/select/{id}', [PromotionLetterController::class, 'letter_print_selected'])->name('letter_print_selected');

    // all internLetterController routes 
    Route::get('/Intern-letter', [InternLetterController::class, 'index'])->name('intern-letter.index');
    Route::get('/create-intern-letter/{id}', [InternLetterController::class, 'create'])->name('create.internletter');
    Route::post('/create-intern-letter/store', [InternLetterController::class, 'store'])->name('intern-letter.store');
    Route::get('/all_intern-letter', [InternLetterController::class, 'all_letter'])->name('all.intern.letter');
    Route::get('/print-intern-letter/select/{id}', [InternLetterController::class, 'letter_print_selected'])->name('intern-letter-print-selected');

    // all jobagreement route
    Route::get('/job-agreement', [JobAgreementController::class, 'index'])->name('jobagreement.index');
    Route::get('/job-agreement/create/{id}', [JobAgreementController::class, 'create'])->name('create.jobagreement');
    Route::post('/job-agreement/store', [JobAgreementController::class, 'store'])->name('job-agreement.store');
    Route::get('/all/job-agreement', [JobAgreementController::class, 'all_agreement'])->name('all.agreement');
    Route::get('/job-agreement/select/{id}', [JobAgreementController::class, 'agreement_print_selected'])->name('job_agreement_print_selected');


    //salary Sheet 
    Route::get('/salary-accepte', [SalarySheetController::class, 'salary_acceptance'])->name('salary_acceptance');
    Route::get('/salary-salary_sheet_for_bank', [SalarySheetController::class, 'salary_sheet_for_bank'])->name('sheet_for_bank');


    //bank controller
    Route::get('/add_bank', [BankController::class, 'add_bank'])->name('add.bank');
    Route::post('/store_bank', [BankController::class, 'bank_store'])->name('bank.store');
    // branch route 
    Route::get('/add_branch', [BankController::class, 'add_branch'])->name('add.branch');
    Route::post('/store_branch', [BankController::class, 'branch_store'])->name('branch.store');
});
