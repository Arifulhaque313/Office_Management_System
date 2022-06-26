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
                <div class="card-header">{{ __('Add New Employee') }}</div>

                <div class="card-body">
                    <form action="{{ route('store.employee') }}" method="POST">
                        @csrf

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"  value="{{ old('name') }}">
                            
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>



                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="father_name">Father's Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control @error("father_name") is-invalid @enderror"  value="{{ old("father_name") }}">  
                                
                              @error("father_name")
                                    <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="expire-con w-100">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" name="mother_name" id="mother_name" class="form-control @error("mother_name") is-invalid @enderror"  value="{{ old("mother_name") }}">
                                @error("mother_name")
                                    <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error("email") is-invalid @enderror" value="{{ old('email') }}" >
                            @error("email")
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="mobile" id="phone" class="form-control @error("mobile") is-invalid @enderror" value="{{ old('mobile') }}" >  
                                @error("mobile")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="expire-con w-100">
                                <label for="nid">NID Number</label>
                                <input type="text" name="nid" id="nid" class="form-control @error("nid") is-invalid @enderror"  value="{{ old('nid') }}">
                                @error("nid")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="employee_type">Employee Type</label>
                            
                                <select name="employee_type" id="employee_type" class="form-select @error('employee_type') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    <option value="intern">Intern</option>
                                    <option value="permanent">permanent</option>
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
                                        <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                    @endforeach
                                </select>
                                    @error("designation_id")
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error("address") is-invalid @enderror" value="{{ old('address') }}" >
                            @error("address")
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  >
                                @error("password")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror  
                            </div>

                            <div class="expire-con w-100">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"  >
                                @error("password_confirmation")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 ">
                            <hr>
                            <center><p>&#40;optional&#41;</p></center>
                        </div>

                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="bank_id">Bank Name</label>
                                <select name="bank_id" id="bank_id" class="form-select">
                                    <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                                
                            </div>

                            <div class="expire-con w-100">
                                <label for="account_number">Bank Account Number</label>
                                <input type="account_number" name="account_number" id="account_number" class="form-control"  >
                                
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary employee_button ">
                                    {{ __('Add') }}
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
    {{-- <script>
        $('#employee_type').change(function () {
        var responseID = $(this).val();
        if (responseID == "intern") {
        $('#intern').removeClass("d-none");
        $('#permanent').addClass("d-none");
        }
        else {
        $('#intern').addClass("d-none");
        $('#permanent').removeClass("d-none");
        }
        
        });

    </script> --}}
@endsection
