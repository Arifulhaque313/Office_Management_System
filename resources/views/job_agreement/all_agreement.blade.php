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
                <div class="card-header">All Job Agreement</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Sr No</th>
                            <th>Employee Id</th>
                            <th>name</th>
                            <th>Designation</th>
                            
                            
                        </tr>

                        @foreach ($job_agreements as $job_agreement)
                            <tr>
                                <td><a href="{{ route('job_agreement_print_selected',$job_agreement->employee_id) }}" class="text-dark">{{ $job_agreement->id }}</a></td>
                                <td><a href="{{ route('job_agreement_print_selected',$job_agreement->employee_id) }}" class="text-dark">{{ $job_agreement->employee_id }}</a></td>
                                <td><a href="{{ route('job_agreement_print_selected',$job_agreement->employee_id) }}" class="text-dark">{{ $job_agreement->employee_name }}</a></td>
                                <td><a href="{{ route('job_agreement_print_selected',$job_agreement->employee_id) }}" class="text-dark">{{ $job_agreement->designation_name}}</a></td>
                            </tr>
                            
                        @endforeach

                      
                            <tr>    
                                {{-- {{-- <td><a href="{{route('print-selected',$data->emp_id)}}" class="text-dark">{{$id}}</a></td> --}}
                                {{-- <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->id }}</a></td>
                                <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->employee_name }}</a></td>
                                <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->salary }}</a></td>
                                <td><a href="{{route('letter_print_selected',$promotion_letter->id)}}" class="text-dark">{{ $promotion_letter->designation_name }}</a></td>
                                 --}}
                            
                                
                              
                            </tr>
                       
                      
                       
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