@extends('layouts.app')
{{-- one click edit script --}}
<script src="{{ asset('js/app2.js') }}" defer></script>
<script src="{{ asset('js/domEdit.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   
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
                            <p>: 
                            <span>
                                <span>{{ $date_date }}<sup>th</sup></span> 
                                <span>{{ $date_monthName }}</span>
                            </span>
                        </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{-- letter header end   --}}

        {{-- letter slutatio  --}}
        <div class="letter_salutation">
            <p>Hello, {{ $employee_name }}</p>
        </div>

        {{-- letter body --}}
        <div class="letter_body">
           <p class="first_part">
               {!! $letter_body_firstpart !!}
           </p>
         
           <p class="second_part mt-2">
            {!! $letter_body_secondpart !!}
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
                    <p>HR, Admin - {{ $hr_name }}</p>
                  
                </div>
            </div>
        </div>



</div>
{{-- letter  end   --}}



<style>
    
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