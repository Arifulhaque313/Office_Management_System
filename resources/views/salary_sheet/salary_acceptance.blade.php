@extends('layouts.app')
   
@section('content')

{{-- salary sheet start   --}}
<div class="sheet_container" id="contnet">
        {{-- sheet header start  --}}
        <div class="sheet_header">   
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <p>Ref</p>
                            <p>Dated</p>
                        </div>
                        <div class="col-9">
                            <p>: Salary &nbsp; 
                                @if(isset($employees[0]))
                                    <?php
                                    $date = $employees[0]->fund_date;
                                    $newdate = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $date ) )) ;
                                    // echo $date_date = date('d', strtotime($newdate)); //only date like "20"
                                    echo $date_monthName_ref = date(' F, Y', strtotime($newdate)); 
                                    ?>
                                @endif</p>
                            <p>: 
                                @if(isset($employees[0]))
                                    <?php
                                     $date = $employees[0]->fund_date;
                                     echo $date_date = date('d', strtotime($date)); //only date like "20"
                                     echo $date_monthName = date(' F, Y', strtotime($date)); 
                                    ?>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{-- sheet header end   --}}

        <div class="mt-4">
            <p>IT Corner</p>
            <p>Executive officer</p>
        </div>
         <?php 
                    $i=1;
                    $sum=0;
                ?>
        {{-- salary table start --}}
        <div class="salary_table my-3" style="width: 100%;">
            <table width="100%" id="">
                <tr>
                    <th colspan="5"><h5 style="color: black;font-weight:bold">Dear,</h5></th>
                </tr>
                <tr>
                    <th colspan="5" class="px-3 py-2"> Please check and accept bellow salary acceptance form, this confirms that you accept and  received salary of month: {{ $date_monthName_ref }}
                        and the amount written as bellow on your account  written bellow.
                    </th>
                </tr>

                <tr>
                    <th colspan="5" class="text-center"><h3 style="color: black;font-weight:bold">Employee's Account Details</h3></th>
                </tr>

                <tr>
                    <th class="text-center p-2 fs-6">SL No</th>
                    <th class="p-2 fs-6">Name of Employee</th>
                    <th class="p-2 fs-6">Acceptance</th>
                    <th class="p-2 fs-6">Account No</th>
                    <th class="p-2 fs-6">Amount</th>
                </tr>
               
                @foreach($employees as $employee)
                    <tr>
                        <th class="text-center pt-3 fs-6">{{ $i++ }}</th>
                        <th class="pt-3 fs-6">{{ $employee->name }}</th>
                        <th class="pt-3 fs-6"></th>
                        <th class="pt-3  fs-6">{{ $employee->bank_account }}</th>
                        <th class="text-right pt-3 fs-6">{{ $employee->basic_salary }}</th>
                       
                    </tr>
                    {{-- count total salary  --}}
                     <?php $sum+= $employee->basic_salary ?>
                @endforeach
                <tr>
                    <th class="text-center fs-6" style="padding-top: 40px;"></th>
                    <th  class="pt-3 fs-6">   </th>
                    <th class="pt-3 fs-6"></th>
                    <th class="pt-3  fs-6"></th></th>
                    <th class="text-right pt-3 fs-6"></th>
                </tr>

                <tr>
                    <th class="text-center pt-3 fs-6"></th>
                    <th  class="pt-3 fs-6"></th>
                    <th class="pt-3 fs-6 text-center">Total Amount</th>
                    <th class="pt-3  fs-6"></th>
                    <th class="text-right pt-3 fs-6">{{ $sum }}</th>
                </tr>
                
            </table>

           
        </div>
   

        <div class="regards " style="margin-top: 70px;">
            <p>Thanks & Best Regards</p>
        </div>

        <div class="regards " style="margin-top: 60px;">
            <p>Seal & Signature</p>
        </div>
        

</div>
    

<style>
    .sheet_container{
        font-family: Century Gothic;
        color: black;
        background-color: white;
        width: 816px;
        
        margin: auto;
        padding: 100px 10px   
    }
    p{
        margin-bottom: 0px;
        line-height: 1.5;
        font-size: 18px;
    }
    /* .sheet_header p{
        font-size: 14px;
    }  */

    table th {
        border: 2px solid black;
        border-collapse: collapse;
    }

</style>

 
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script>
    /*****************************
     * auto margin of id info
     *****************************/
    function codespeedy(){
      var print_div = document.getElementById("contnet");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
        // This is the code print a particular div element
    }
   
    
</script>
@endsection