@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Important Notes</div>
                <div class="card-body">
                <div class="list-group-flush">
                    <div class="list-group-item">
                        <a href="{{ route('create.employee') }}" class="d-block">Add New Employee</a>
                    </div>
                    
                    
                </div> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Intern Employees</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            
                            <th>Employee_id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>

                        
                       @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id}}</td>
                                <td>{{ $employee->name}}</td>
                                <td>{{ $employee->designation_name }}</td>
                               <td> <a href="{{route('create.internletter',['id'=> $employee->id])}}" class="text-dark btn btn-primary">Intern Letter</a></td></td>
                            </tr> 
                       @endforeach
                       
                        
                    </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                             {!! $employees->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection