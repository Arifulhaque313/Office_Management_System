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
                        <a href="{{route('id-cart')}}" class="d-block">Create New</a>
                    </div>
                    <div class="list-group-item">
                        <a href="{{route('all-id-carts')}}" class="d-block">All ID Carts</a>
                    </div>
                    
                </div> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All ID Carts</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Sl.</th>
                            <th>ID.</th>
                            <th>Name</th>
                            <th>Designation</th>
                        </tr>
                        <?php $i = 0 ?>
                        @foreach($id_carts as $data)
                            <?php
                                $i++;
                                $joinig_obj = new \DateTime();
                                $joining_date = $data->joining_date;
                                $joinig_obj ->createFromFormat('dmy', $joining_date);
                                $joining_2 = substr($joinig_obj->format('Y'),-2);//2 digit of joining year

                                $date_of_birth = $data->date_of_birth;
                                $dateObj = new \DateTime();
                                $dateObj ->createFromFormat('dmy', $date_of_birth);
                                $birth_2 = substr($dateObj->format('Y'),-2);//2 digit of birth year
                                $designation_code = $data->designation_id;//designation code
                                $office_code = $data->office_id;
                                $id_no = $data->id_no;
                                $id = $joining_2.$birth_2.$designation_code.$office_code.$id_no;
                            ?>
                            <tr>
                                <?php echo $data->id ?>
                                <td><a href="{{route('print-selected',$data->emp_id)}}">{{$i}}</a></td>
                                <td><a href="{{route('print-selected',$data->emp_id)}}" class="text-dark">{{$id}}</a></td>
                                <td><a href="{{route('print-selected',$data->emp_id)}}" class="text-dark">{{$data->name}}</a></td>
                                <td><a href="{{route('print-selected',$data->emp_id)}}" class="text-dark">{{$data->designation_name}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {!! $id_carts->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection