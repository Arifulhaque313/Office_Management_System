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
                <div class="card-header">All Intern Letter</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>salary</th>
                            <th>Designation</th>
                            <th>Hr name</th>
                        </tr>

                       @foreach ($intern_letters as $intern_letter)
                            <tr>    
                               {{-- <td><a href="{{route('print-selected',$data->emp_id)}}" class="text-dark">{{$id}}</a></td> --}}
                                <td><a href="{{route('intern-letter-print-selected',$intern_letter->id)}}" class="text-dark">{{ $intern_letter->id }}</a></td>
                                <td><a href="{{route('intern-letter-print-selected',$intern_letter->id)}}" class="text-dark">{{ $intern_letter->employee_name }}</a></td>
                                <td><a href="{{route('intern-letter-print-selected',$intern_letter->id)}}" class="text-dark">{{ $intern_letter->salary }}</a></td>
                                <td><a href="{{route('intern-letter-print-selected',$intern_letter->id)}}" class="text-dark">{{ $intern_letter->designation_name }}</a></td>
                                <td><a href="{{route('intern-letter-print-selected',$intern_letter->id)}}" class="text-dark">{{ $intern_letter->hr_name }}</a></td>
                              
                            </tr>
                        @endforeach
                      
                       
                    </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection