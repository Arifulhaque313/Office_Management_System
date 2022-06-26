@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            @if(session()->has('success'))
               <div class="alert alert-success">
                   <b>{{ session()->get('success') }}</b>
               </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Update Employee') }}</div>

                <div class="card-body">
                    <form action="{{ route('update.employee',['id'=> $employee->id]) }}" method="POST">
                        @csrf

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"  value="{{ $employee->name }}">
                            
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="father_name">Father's Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control @error("father_name") is-invalid @enderror"  value="{{ $employee->father_name}}">  
                                
                                @error("father_name")
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="expire-con w-100">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" name="mother_name" id="mother_name" class="form-control @error("mother_name") is-invalid @enderror"  value="{{ $employee->mother_name}}">
                                @error("mother_name")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error("email") is-invalid @enderror" value="{{ $employee->email}}" >
                            @error("email")
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="mobile" id="phone" class="form-control @error("mobile") is-invalid @enderror" value="{{ $employee->mobile}}" >  
                                @error("mobile")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="expire-con w-100">
                                <label for="nid">NID Number</label>
                                <input type="text" name="nid" id="nid" class="form-control @error("nid") is-invalid @enderror"  value="{{ $employee->nid}}">
                                @error("nid")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error("address") is-invalid @enderror" value="{{ $employee->address}}" >
                            @error("address")
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>          
                    
                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="employee_type">Employee Type</label>
                                <select name="employee_type" id="employee_type" class="form-select @error('employee_type') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    <option value="intern" {{ $employee->employee_type === 'intern' ? 'selected' : '' }}>Intern</option>
                                    <option value="permanent" {{ $employee->employee_type === 'permanent' ? 'selected' : '' }}>permanent</option>
                                </select>
                                @error("employee_type")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="expire-con w-100">
                                <label for="designation_id">Designation</label>
                                <select name="designation_id" id="designation_id" class="form-select @error('employee_type') is-invalid @enderror">
                                    <option value="">Select Designation</option>
                                    @foreach($designations as $designation)
                                        {{-- <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option> --}}
                                        <option value="{{ $designation->id }}" {{ $employee_designation->id === $designation->id ? 'selected' : '' }}>{{ $designation->designation_name }}</option>
                                    @endforeach
                                </select>
                                    @error("designation_id")
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>          
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="bank_id">Bank Name</label>
                                <select name="bank_id" id="bank_id" class="form-select">
                                    <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                    @if(isset($bank_account->bank_id) && $bank_account->bank_id !='')
                                         <option value="{{$bank->id}}" {{ $bank_account->bank_id === $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                    @else
                                        <option value="{{$bank->id}}">{{ $bank->name }}</option>
                                    @endif
                                @endforeach
                                </select> 
                            </div>

                            <div class="expire-con w-100">
                                <label for="account_number">Bank Account Number</label>
                                @if(isset($bank_account->account_number) && $bank_account->account_number !='')
                                    <input type="account_number" name="account_number" id="account_number" class="form-control" value="{{ $bank_account->account_number }}">
                                @else
                                    <input type="account_number" name="account_number" id="account_number" class="form-control" value="">
                                @endif 
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 ps-3">
                            {{-- <label for="email">Email</label> --}}
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status" value="{{ $employee->status }}" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 3em; height:1.5em;" {{ $employee->status == 1 ? 'checked' : '' }} >
                                <label class="form-check-label ps-3 mt-1" for="flexSwitchCheckDefault">Active Status</label>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary add-btn">
                                    {{ __('Update') }}
                                </button>
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
    
@endsection
