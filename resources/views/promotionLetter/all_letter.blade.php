@extends('layouts.app')
   
@section('content')
@php use Illuminate\Support\Facades\DB;  @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Important Notes</div>
                <div class="card-body">
                <div class="list-group-flush">
                    <div class="list-group-item">
                        <a href="{{route('all.employee')}}" class="d-block">Create New</a>
                    </div>
                    <div class="list-group-item">
                        <a href="{{ route('letter_template') }}" class="d-block">Letter Template View</a>
                    </div>
                </div> 
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Promotion Letter</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>salary</th>
                            <th>From Designation</th>
                            <th>To Designation</th>
                            <th>Hr name</th>
                        </tr>

                    @foreach ($promotion_letters as $promotion_letter)
                        <tr>    
                            <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->id }}</a></td>
                            <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->employee_name }}</a></td>
                            <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->salary }}</a></td>
                            <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->designation_name }}</a></td>
                            <td> <a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">
                                @php
                                $to_desig= DB::table('designations')->where("id",$promotion_letter->to_designation)->select()->first();
                                echo($to_desig->designation_name);
                                @endphp
                                </a>
                            </td>
                            <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->hr_name }}</a></td>
                        </tr>
                    @endforeach
                    </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {{-- {!! $promotion_letters->links('pagination::bootstrap-4') !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection