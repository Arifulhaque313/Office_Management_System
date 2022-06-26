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
                <div class="card-header">Add Branch</div>
                <div class="card-body">
                    <form action="{{route('branch.store')}}" method="post" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="bank_id">Bank Name</label>
                            <select name="bank_id" id="bank_id" class="form-select">
                                    <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                            @error('bank_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="name">Branch Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="">
                            @error('name')
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