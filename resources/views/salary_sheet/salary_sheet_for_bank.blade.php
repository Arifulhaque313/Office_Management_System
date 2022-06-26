@extends('layouts.app')
   
@section('content')

{{-- salary sheet start   --}}
<div class="sheet_container" id="" style="padding-top:200px;">
        {{-- sheet header start  --}}
        <div class="sheet_header">   
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <p>Ref</p>
                            <p>Date</p>
                        </div>
                        <div class="col-9">
                            <p>: Salary &nbsp; 
                                @if(isset($employees[0]))
                                    <?php
                                    $date = $employees[0]->fund_date;
                                    $previouesdate = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $date ) )) ;
                                    // echo $date_date = date('d', strtotime($newdate)); //only date like "20"
                                    echo $previouesdate_monthName = date(' F, Y', strtotime($previouesdate)); 
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
            <p>The in-Charge</p>
            <p>Southeast Bank Limited</p>
            <p>Shepahibag Bazar Uposhaka</p>
        </div>

        <div class="my-5">
            <h6 style="color: black;">Dear Sir,</h6>
            <p>Please  desburse Salary for the  month {{ $previouesdate_monthName }} by  debiting  out account  bearing no  0045 11100000855 in the name of "IT Corner"
                maintaining with your shepahibag Bazar Uposhaka to the  followig employees  accounts of your bank.
            </p>
        </div>

        {{-- salary table start --}}
        <div class="salary_table my-3" style="width: 100%;">
            
            <div class="table-caption text-center  my-2">
                <p>IT CORNER</p>
                <p>Employee's Accounts Detail</p>
            </div>

            <table width="100%">
                <tr>
                    <th>SL No</th>
                    <th>Name of Employee</th>
                    <th>SEBL, Branch/Uposhaka</th>
                    <th>Account No</th>
                    <th>Amount</th>
                </tr>

                <?php 
                    $i=1; 
                    $sum = 0;
                ?>
                @foreach($employees as $employee)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td  class=" ">{{ $employee->name }}</td>
                        <td class=" ">Shepahibagh Bazar Uposhaka</td>
                        <td class=" ">{{ $employee->bank_account }}</td>
                        <td class="text-right  ">{{ $employee->basic_salary }}.00</td>
                    </tr>   
                    <?php 
                        $sum+=$employee->basic_salary;
                    ?>
                @endforeach
                <tr>
                    <th class="text-center " style="padding-top: 15px;"></th>
                    <th  class="">   </th>
                    <th class=""></th>
                    <th class=""></th></th>
                    <th class="text-right  "></th>
                </tr>

                <tr>
                    <th class="text-center pt-1 "></th>
                    <th  class="pt-1 "></th>
                    <th class="pt-1  text-center">Total Amount</th>
                    <th class="pt-1  "></th>
                    <th class="text-right pt-1 "> {{ $sum }}.00</th>
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
       
    }
    /* .sheet_header p{
        font-size: 14px;
    }  */

    table th {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }
    table td{
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }

</style>

 
@endsection