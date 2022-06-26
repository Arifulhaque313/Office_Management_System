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
                <div class="card-header">Create an Intern Letter</div>
                <div class="card-body">
                    <form action="{{ route('intern-letter.store') }}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-group w-60 mx-auto mb-3">
                            <input type="hidden" name="employee_id" value="{{ $user->id }}">
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" disabled>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ date('Y-m-d') }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="expire-con w-100">
                                <label for="effective_date">Effective Date</label>
                                <input type="date" name="effective_date" id="effective_date" class="form-control @error('date') is-invalid @enderror" value="">
                                @error('effective_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="designation">Designation</label>
                            <select name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror">
                                
                               
                                    <option value="{{ $designations->id }}" selected>{{ $designations->designation_name }}</option>
                               
                            </select>

                            @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                     

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="salary">Salary</label>
                            <input type="text" id="salary" name="salary" class="form-control @error('salary') is-invalid @enderror" >

                            @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="">HR</label>
                            <select name="hr_id" id="hr" class="form-control @error('hr_id') is-invalid @enderror">
                                <option value="">Select one</option>
                                @foreach ($hrs as $hr)
                                    
                                    <option value="{{ $hr->id }}" selected>{{ $hr->hr_name }}</option>
                                @endforeach
                            </select>
                            @error('hr_id')
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