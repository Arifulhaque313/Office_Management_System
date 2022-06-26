@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <div class="card">
            <form class="ajax-form" method="post" action="{{ route('office.add') }}">
                @csrf
                    <div class="row">

                        <!-- all test list -->
                        <div class="col-md-12 form-group test-list">

                            <!-- item start -->
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label>Office ID</label>
                                    <input type="text" class="form-control" name="office_id" >
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Office Name</label>
                                    <input type="text" class="form-control" name="office_name" >
                                </div>

                            </div>
                            <!-- item end -->

                        </div>

                        <div class="col-md-12 form-group text-right">
                            <button type="submit" class="btn btn-outline-dark">
                                Add
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection