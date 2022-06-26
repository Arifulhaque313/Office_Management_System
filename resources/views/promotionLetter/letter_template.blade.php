@extends('layouts.app')
   
@section('content')

{{-- letter start   --}}
<div class="letter_container" id="promotion_letter">
        {{-- letter header start  --}}
        <div class="letter_header">   
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <p>From</p>
                            <p>Subject</p>
                            <p>Date</p>
                        </div>
                        <div class="col-9">
                            <p>: IT CORNER, ADMIN</p>
                            <p>: Letter of Promotion</p>
                            <p>: 18th April, 2022</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{-- letter header end   --}}

        {{-- letter slutatio  --}}
        <div class="letter_salutation">
            <p>Hello, MD. Shaheen Reza</p>
        </div>

        {{-- letter body --}}
        <div class="letter_body">
           <p class="first_part">
            Because of your hard work and good performance, IT CORNER decided to promote you from Software Engineer to Senior Software Engineer. Please deposit your ID card and get the new one from HR. I am also happy to inform you that, your regular salary will be 30K (30,000) BDT from May 2022.
           </p>
           <p class="second_part mt-2">
            I wish and hope you will remain and continue your hard work and dedication to IT CORNER, so I can get a chance to increase your salary and appreciate you again and again.
           </p>
        </div>
        {{-- letter_body End  --}}

        {{-- closing part   --}}
        <div class="closing_part">
            <div class="row">
                <div class="col-5">
                    <div style=" border-top:1px solid black; width:200px;"></div>
                    <p>Thank You</p>
                    <p>Chairman, CEO - Auntar Hasan</p>
                </div>
                <div class="col-3"></div>
                <div class="col-4">
                    <div style=" border-top:1px solid black; width:200px;"></div>
                    <p>Thank You</p>
                    <p>HR, Admin - Hasan</p>
                </div>
            </div>
        </div>



</div>
{{-- letter  end   --}}

<style>
    .letter_container{
        font-family: Century Gothic;
        color: black;
        background-color: white;
        height: 1056px;
        width: 816px;
        margin: auto;
        padding: 250px 40px   
    }
    p{
        margin-bottom: 0px;
        line-height: 1.5;
    }
    .letter_header p{
        font-size: 17px;
    }
    .letter_salutation{
        margin-top: 96px;
    }
    .letter_body{
        margin-top: 40px;
        text-align: justify;
    }
    .closing_part{
        margin-top: 200px;
    }
    .letter_salutation  p{
        font-size: 15px;
    }
    .letter_body  p{
        font-size: 16px
    }
    .closing_part p{
        font-size: 15px
    }
</style>

 
@endsection