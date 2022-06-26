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
                <div class="card-header">Add Basic Salary</div>
                <div class="card-body">
                    <form action="{{route('store.salary')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="employee_id">Employee Name</label>
                            <select name="employee_id" id="" class="form-control @error('employee_id') is-invalid @enderror">
                                <option value="">Select Employee</option>
                                 @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{ $employee->name }}</option>
                                 @endforeach
                            </select>
                            @error('employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="salary_ammount">Salary Ammount</label>
                            <input type="text" name="salary_ammount" id="salary_ammount" class="form-control @error('employee_id') is-invalid @enderror">
                            @error('salary_ammount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="">
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="">
                            @error('end_date')
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