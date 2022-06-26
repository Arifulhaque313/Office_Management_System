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
            <div class="card">
                <div class="card-header">Create an ID Cart</div>
                <div class="card-body">
                    <form action="{{route('id-cart')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-60 mx-auto mb-3 d-lg-flex">
                            <div class="joining-con w-100 mr-lg-3">
                                <label for="joining-date">Joining Date</label>
                                <input type="date" name="joining_date" id="joining-date" class="form-control" value="{{ old('joining_date') }}">
                                @error('joining_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="expire-con w-100">
                                <label for="expire-date">Expired Date</label>
                                <input type="date" name="expired_date" id="expired-date" class="form-control" value="{{ old('expired_date') }}">
                                @error('expired_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group w-60 mx-auto mb-3 d-flex">
                            <div class="w-100 mg-lg-3">
                                <label for="date-of-birth">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date-of-birth" class="form-control" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="blood-group">Bood Group</label>
                                <select name="blood_group" id="blood-group" class="form-control">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                @error('blood_group')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="designation">Designation</label>
                            <select name="designation" id="designation" class="form-control">
                                @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="office">Office</label>
                            <select name="office" id="office" class="form-control">
                                @foreach($offices as $office)
                                    <option value="{{$office->id}}">{{$office->office_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="id-no">ID No.</label>
                            <input type="number" name="id_no" id="id-no" class="form-control" min="1" max="99" step="1" value="{{ old('id_no') }}">
                            @error('id_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-60 mx-auto mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" name="image" id="photo" class="form-control" value="{{ old('photo') }}">
                            @error('image')
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