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
                <div class="card-header">Create Job Agreement</div>
                <div class="card-body">
                    <form action="{{ route('job-agreement.store') }}" method="post" enctype="multipart/form-data">
                        
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

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ date('Y-m-d') }}">
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="designation">Designation</label>
                            <select name="designation_id" id="designation" class="form-control @error('designation_id') is-invalid @enderror">
                                <option value="">Select one</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                @endforeach
                            </select>

                            @error('designation_id')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                         {{-- if intern   --}}
                        <div class="" id="intern">
                            <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                                <div class="joining-con w-100 mr-lg-3">
                                    <label for="date">First Month</label>
                                    <input type="date" name="month1"  class="form-control @error('month1') is-invalid @enderror" value="">
                                    @error('month1')
                                     <div class="text-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                                <div class="expire-con w-100">
                                    <label for="effective_date">First Month Salary</label>
                                    <input type="text" name="salary1" id="effective_date" class="form-control @error('salary1') is-invalid @enderror" value="">
                                    @error('salary1')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                            </div>

                            <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                                <div class="joining-con w-100 mr-lg-3">
                                    <label for="date">Second Month</label>
                                    <input type="date" name="month2"  class="form-control @error('month2') is-invalid @enderror" value="">
                                    @error('month2')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                                <div class="expire-con w-100">
                                    <label for="effective_date">Second Month Salary</label>
                                    <input type="text" name="salary2" id="effective_date" class="form-control @error('salary2') is-invalid @enderror" value="">
                                    @error('salary2')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                            </div>

                            <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                                <div class="joining-con w-100 mr-lg-3">
                                    <label for="date">Third Month</label>
                                    <input type="date" name="month3"  class="form-control @error('salary2') is-invalid @enderror" value="">
                                    @error('month3')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                                <div class="expire-con w-100">
                                    <label for="">Third Month Salary</label>
                                    <input type="text" name="salary3" id="" class="form-control  @error('salary2') is-invalid @enderror" value="">
                                    @error('salary3')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                            </div>
                        </div>

                        {{-- if permanet   --}}
                        <div class="form-group w-60 mx-auto mb-3 " id="permanent">
                            <label for="regular_salary">Regualr Salary</label>
                            <input type="text" name="regular_salary" id="regular_salary" class="form-control @error('regular_salary') is-invalid @enderror">
                            @error('regular_salary')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- dependent dropdown finish  --}}

                        
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="">HR</label>
                            <select name="hr_id" id="hr" class="form-control @error('hr_id') is-invalid @enderror">
                                @foreach ($hrs as $hr)
                                    <option value="">Select one</option>
                                    <option value="{{ $hr->id }}">{{ $hr->hr_name }}</option>
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