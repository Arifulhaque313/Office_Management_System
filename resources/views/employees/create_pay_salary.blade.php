@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Important Notes</div>
                <div class="card-body">
                <div class="list-group-flush">
                    <div class="list-group-item custom-list-item-success border-bottom-0 mb-3">
                        <p>Please fill out all field carefully.</p>
                    </div>
                    <div class="list-group-item custom-list-item-danger">
                        <p>All fields are required.</p>
                    </div>
                </div> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <b>{{ session()->get('success') }}</b>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Add Pay Salary</div>
                <div class="card-body">
                    <form action="{{route('store_pay.salary')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="employee_id">Employee Name</label>
                            <select name="employee_id" id="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
                                <option value="">Select Employee</option>
                                 @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{ $employee->name }}</option>
                                 @endforeach
                            </select>
                            @error('employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" id="push_bank_account" name="bank_account">
                        <input type="hidden" id="push_basic_salary" name="basic_salary">


                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="bank_account">Bank Account</label>
                            <input type="text" name="bank_account" id="bank_account" class="form-control @error('bank_account') is-invalid @enderror" disabled>
                            @error('bank_account')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="basic_salary">Basic Salary</label>
                            <input type="text" name="basic_salary" id="basic_salary" class="form-control @error('basic_salary') is-invalid @enderror" disabled>
                            @error('basic_salary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="fund_date">Fund Date</label>
                            <input type="date" name="fund_date" id="fund_date" class="form-control" value="">
                            @error('fund_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-lg-flex w-60 mx-auto mb-4">
                            <div class="w-100"></div>
                            <div class="w-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



@section('script')

<script type=text/javascript>
    $('#employee_id').change(function(){
        var employee_id = $(this).val();
        $.ajax({
            type:"GET",
            url:"{{url('/admin/get-bank-account')}}", 
            data:{employee_id:employee_id},
            dataType: "json",
            success:function(data){
                if(data.bank_account == ""){
                    $("#bank_account").closest('.form-group').hide();
                }
                $("#bank_account").val(data.bank_account);
                $("#basic_salary").val(data.basic_salary);

                $("#push_bank_account").val(data.bank_account);
                $("#push_basic_salary").val(data.basic_salary);

            }
        });
    });
</script> 

@endsection