@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Important Notes</div>
                <div class="card-body">
                <div class="list-group-flush">
                    <div class="list-group-item">
                        <a href="{{ route('create.employee') }}" class="d-block">Add New Employee</a>
                    </div>
                    <div class="list-group-item">
                        <a href="{{ route('add.salary') }}" class="d-block">Add Basic Salary</a>
                    </div>
                    <div class="list-group-item">
                        <a href="{{ route('pay.salary') }}" class="d-block">Add Pay Salary</a>
                    </div>
                </div> 
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">All Employees</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Sl.</th>
                            <th>Employee_id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>

                    <?php $i=1;  ?>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $employee->id}}</td>
                            <td>
                                {{ $employee->name}}
                                @if($employee->status==1)
                                    <span class="badge bg-success badge-pill">Active</span>
                                @else
                                    <span class="badge bg-danger badge-pill">Deactive</span>
                                @endif
                            </td>
                            <td>{{ $employee->designation_name }}</td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{route('edit.employee',['id'=> $employee->id])}}" class="text-dark btn btn-primary me-2">Edit</a>
                                    <a href="javascript:void(0)" data-empid="{{ $employee->id }}" class="text-white btn btn-danger ms-2 delete" >Delete</a>
                                </div>
                            </td>
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


@section('script')
    <script>
        $('.delete').on('click',function(e){
            e.preventDefault();
            let empid=$(this).data("empid");
            
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"{{route('destroy.employee')}}",
                    type:"GET",
                    dataType: 'json',
                    data:{id:empid},
                    
                    success:function(data){
                        console.log(data);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )   
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                   }
                });
            }
        })
        });
    </script>

@endsection