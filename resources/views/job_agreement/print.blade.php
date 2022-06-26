@extends('layouts.app')
{{-- one click edit script --}}
<script src="{{ asset('js/app2.js') }}" defer></script>
<script src="{{ asset('js/domEdit.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   
@section('content')

   {{-- job agreement first page   --}}
<section class="job_agreement_container" id="promotion_letter" style="padding-top: 70px">
        <div class="d-flex justify-content-between first_page">
            <div class="left">
                <div class="blue_line">
                </div>
                <div class="orange_line">

                </div>
         
            </div>
            <div class="right text-right">
                <img class="" src="{{ asset('images/itcornerLogo.png') }}" alt="it Corner  Logo" >

                {{-- middle text  --}}
                <div class="text-right" style="margin-top:50%;">
                    <h5>Job Agreement</h5>
                    <h1>{{ $designation }}</h1>
                </div>

                {{-- footer text  --}}
                <div class="text-right" style="margin-top:60%;">
                    <h5>IT CORNER</h5>
                    <h5>Dhaka, Bangladesh</h5>
                </div>
            </div>
        </div>


          {{-- footer  --}}
   <div class="d-flex justify-content-between" style="margin-top: 60px;">
        <div class="date mt-5 ms-5">
            <h5>{{ $date_date }} <sup>th</sup>{{ $date_monthName }}</h5>
        </div>
        <div class="logo mt-5">
            <img src="{{asset('images/footerlogo.png')}}" alt="" width="60px" height="55px">
        </div>
   </div>


</section>


{{-- job agreement second page   --}}
<section class="job_agreement_container" id="promotion_letter" style="padding-top: 150px;">
   
    {{-- spage header   --}}
    <div class="text-center fw-bolder" style="padding-top:30px;">
        <h3><b>IT CORNER</b></h3>
        <h3><b>JOB AGREEMENT</b></h3>
    </div>

    {{-- second page content   --}}
    <div class="page_content">
        <p class="mt-5">Employment <br>The Employee agrees that he or she will faithfully and to the best of their ability to carry out the duties and responsibilities communicated to them by the Employer. The Employee shall comply with all company policies, rules, and procedures at all times.
        </p>
    
        <p class="mt-3">Position <br>
            As a <b style="font-weight: 900">{{ $designation }}</b>, the Employee performs all essential job functions and duties. From time to time, the Employer may also add other duties within the reasonable scope of the Employee’s work.
            </p>
    
        <p  class="mt-3">Termination  <br>
            IT Corner has the right to terminate the employee anytime (with or without reason). If the termination happens in the middle of the month IT Corner will not pay any amount or salary for that current month. After termination, all due salaries will be paid within 90 working days.
            </p>
        <p class="mt-3">Employees have no right to leave the job before 3 months of working except IT Corner’s permission, If an employee left the job by him/herself IT Corner will not pay any amount as salary or anything else.</p>
      
        <p class="mt-3">If an employee wants to leave the job he/she has to inform IT Corner before 2 months.</p>
        <p class="mt-3">Absent or Leave <br>
            The employee has 1 day leave every week, except this and Govt. holidays no leave is allowed if the employee takes any leave IT Corner will cut salary for that day, IT Corner have right to cut salary up to 5days for a single day leave.
            If the employee attends office after 10:00 AM that day will count as absent and no salary will be paid for that day.
            </p>
        <p class="mt-3">Salary <br>
            The salary mentioned below here is final, and IT Corner has the right to change it anytime without any notice. Salary will be credited to employee’s bank account or by cash from admin, Admin has right to hold the salary up to 3 months. If the employee is terminated by admin have the right to cancel the salary and the employee agrees not to complain against it anywhere.
            </p>
        <p class="mt-3">Non-Competition and Confidentiality <br>
            As an Employee, you will have access to confidential information that is the property of the Employer. You are not permitted to disclose this information outside of the Company.
            </p>
    </div>


        {{--page footer  --}}
        <div class="d-flex justify-content-between" style="margin-top: 40px;">
            <div class="date mt-5 ms-5">
                <h5>{{ $date_date }} <sup>th</sup>{{ $date_monthName }}</h5>
            </div>
            <div class="logo mt-5">
                <img src="{{asset('images/footerlogo.png')}}" alt="" width="60px" height="55px">
            </div>

        </div>

</section>
{{-- end  --}}



{{-- job agreement third page   --}}
<section class="job_agreement_container " id="promotion_letter" style="padding-top:100px;">
   
    <div class="page_content">
            <p class="mt-4">During your time of Employment with the Employer, you may not engage in any work for another Employer. Can’t do any kind of freelancing work or anything else as well</p>
            <p class="mt-3">The agreement  <br>
                Employers (IT Corner) have the right to change this agreement anytime (with or without notice) they want.
            </p>

            <p class="mt-3">After termination <br>
                If the employee left the job or get terminated by the employer he has to hand over all the work and responsibilities with immediate effect no less than 24 hours, he has to hand over the ID card as well, violation of this can cause a fine of up to 50 lakh BDT.
            </p>

            <p class="mt-3">Dress up and Behavior <br>
                Employees have to maintain gentle behavior on the office ground no smoking or drinking allowed on office space can’t use any kind of slang language or misbehave to other employees or admin, have to maintain well dress up and have to attend on the proper time, an employee can’t leave the office without fingerprint or admin permission.
            </p>
            <p class="mt-3">Dishonesty <br> Having contact or discussion with any client/customer of IT Corner or, offering product or service without IT Corners knowledge or permission or selling product or service or trying to sell product or service to any client/customer or any other person or entity  is a serious crime and it can cause a fine of up to 50,00,000.00 BDT
            </p>

            <p class="mt-3">Employers can’t use any kind of fin-tech app that we developed for our clients.</p>
            <p class="mt-3">Documents <br>
                All documents of KYC received at the IT Corner office are not returnable, once an employee submits the KYC documents he/she will show the original copy and submit the photocopy.
                Submit the KYC documents he/she will show the original copy and submit the photocopy.
            </p>

            <p class="mt-3">Decision  <br>
                Any decision taken by IT Corner admin is final and not negotiable and employees have no right to bargain that decision and the employee agrees that he/she will obey that decision without question.
            </p>
            <p class="mt-3">Loan and liability <br>
                IT Corner takes no liability for any kind of financial activity employee perform if the employee has any credit card or loan or any other liability he/she will take that liability him/herself IT Corner will not take any liability of that IT Corner also not provide any kind of support for that as well.
            </p>
            <p class="mt-3">
                I have read all the terms and conditions above and agrees and promised that I will follow all the terms on my duty time
            </p>
    </div>

    
    {{-- footer  --}}
    <div class="d-flex justify-content-between " style="margin-top: 60px;">
        <div class="date mt-5 ms-5">
            <h5>{{ $date_date }} <sup>th</sup>{{ $date_monthName }}</h5>
        </div>
        <div class="logo mt-5">
            <img src="{{asset('images/footerlogo.png')}}" alt="" width="60px" height="55px">
        </div>

    </div>
</section>
{{-- end  --}}

{{-- job agreement fourth page   --}}
<section class="job_agreement_container" id="promotion_letter" style="padding-top: 120px;">
   
    {{-- letter head  --}}
    <div class="letter_head">
        <h4>Name : {{ $employee_name }}</h4>    
        <h4>Phone Number : {{ $job_agreement->mobile}}</h4>  
    </div>

    {{-- subject --}}
    <div class="letter_subject mt-5">
        <h4 style="font-weight: 700">Sub : Offer Letter for Employment</h4>
        <h4>Dear <span style="font-weight: 700">{{ $employee_name }}</span></h4>
    </div>

    {{-- letter body   --}}
    <div class="letter_body">
        <p>This is IT Corner concerning your application and subsequent interview held at our office. We are pleased to offer you a position as a junior web developer.</p>
    </div>

    {{-- salary table  --}}
    <div class="salary_table" style="margin-top:250px; margin-bottom:250px;">
        
        <div class="d-flex justify-content-between mb-3 px-3 py-2" style="border:1px solid black; ">
            <div>
                <h5 style="font-weight: 700">Month</h5>
            </div>
            <div>
                <h5  style="font-weight: 700">Salry in  BDT</h5>
            </div>
        </div>

        {{-- salary table   --}}
           <div class="table_container " >
            <table width="100%" style="color: black;">
                <tr>
                    <th>1st Month ({{$month1_monthName}})</th>
                    <th style="text-align: right">{{ $job_agreement->salary1 }}</th>
                </tr>
                <tr>
                    <th>2nd Month ({{$month2_monthName}})</th>
                    <th style="text-align: right">{{ $job_agreement->salary2 }}</th>
                </tr>
                <tr>
                    <th>3rd Month ({{$month3_monthName}})</th>
                    <th style="text-align: right">{{ $job_agreement->salary3 }}</th>
                </tr>
                <tr>
                    <th>Regular Salary</th>
                    <th style="text-align: right">{{ $job_agreement->regular_salary }}</th>
                </tr>
            </table>
           </div>
    </div>


    {{-- page 4 footer   --}}
    <div class="pg_4_footer">
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
                <p>HR, Admin - {{ $hr_name }}</p>
              
            </div>
        </div>
    </div>
    
    
   {{-- footer  --}}
   <div class="d-flex justify-content-between  mt-2">
        <div class="date mt-5 ms-5">
            <h5>{{ $date_date }} <sup>th</sup>{{ $date_monthName }}</h5>
        </div>
        <div class="logo mt-5">
            <img src="{{asset('images/footerlogo.png')}}" alt="" width="60px" height="55px">
        </div>
    </div>

</section>
{{-- end  --}}


{{-- job agreement fifth page   --}}
<section class="job_agreement_container" id="promotion_letter" style="padding-top: 150px;">
   
    <p>Some personal details about the Employee and confirmations of agreement and terms are given above.</p>
    
    {{-- personal information   --}}
    <div class="personal_information m-5" >
        <h5 style="mt-1"><span style="font-weight: 900">Name : </span> {{ $employee_name }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">Father's Name : </span> {{ $job_agreement->father_name }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">Mother's Name : </span> {{ $job_agreement->mother_name }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">Address : </span> {{ $job_agreement->address }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">NID Number : </span> {{ $job_agreement->nid }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">Mobile Number : </span> {{ $job_agreement->mobile }}</h5>
        <h5 class="mt-1"><span style="font-weight: 900">Email Address : </span> {{ $job_agreement->email }}</h5>
        
    </div>

    {{-- second letter body   --}}
    <div class="" style="margin-top: 100px;">
        <p>I {{ $employee_name }} confirm that above given information is 100% accurate and I have read all the terms and conditions above and agree and promised that I will follow all the terms on my duty time</p>
        <p class="mt-3">I also confirm that I am not involved with any kind of crime or criminal activities or have not done anything in the past.</p>
        <p class="mt-5">I confirm that I will not involve with any kind of business or part-time or full-time job besides this job on my employment time at IT CORNER.</p>
        <p class="mt-5">I confirm that my last employer (If the employee has) has no objection to me and I didn't perform any kind of illegal work there.</p>
    </div>

    {{-- signature section --}}
    <div class="" style="margin-top:150px">
        <h5>{{ $employee_name }}</h5>
        <h5>{{ $designation }}</h5>
    </div>


     {{-- footer  --}}
   
    <div class="d-flex justify-content-between " style="margin-top: 90px;">
        <div class="date mt-5 ms-5">
            <h5>{{ $date_date }} <sup>th</sup>{{ $date_monthName }}</h5>
        </div>
        <div class="logo mt-5">
            <img src="{{asset('images/footerlogo.png')}}" alt="" width="60px" height="55px">
        </div>
   </div>
</section>
{{-- end  --}}




<style>
    body{
        -webkit-print-color-adjust: exact; 
    }
    
   .job_agreement_container{
        width: 8.27in;
        font-family: Century Gothic;
        color: black;
        background-color: white; 
        margin:  40px  auto;
        /* padding: 100px 50px 50px 50px;   */
        position: relative;  
   }
   .page_content p{
       font-size: 16px;
   }

   p{
       font-size: 16px;
   }
   .page-footer{
        position: absolute;
   } 

   h1,h2,h3,h4,h5,h6,p{
       color: black
   }
   /* first page  css start */
   .blue_line{
       width: 35px;
        height: 900px;
        background-color: #002060;
    }
    .orange_line{
        width: 35px;
        height: 28px;
        background-color: #ff0000;
        margin-top: 15px;
    }
    .first_page{
        /* position: relative; */
    }
    .right img{
        /* position: absolute; */
       
        width: 45%;
    }
    /* .first_page_text_center{
       margin-top: auto;
       margin-bottom: auto;
    } */
    /* first page css end  */


    table th{
        border: 1px solid black !important;
        border-collapse: collapse !important;
        padding: 10px;
        width: 50%;
        font-size: 15px;
    }

    
   @media print {
    body{
        width: 21cm;
        height: 29.7cm;
      
        /* change the margins as you want them to be. */
   } 
}
   
</style>


<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>


 
@endsection