@extends('layouts.app')
   
@section('content')
<style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&display=swap');
        @import url(storeage_path('fonts/CenturyGothic.ttf'));
        .id-cart{
            -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
            color-adjust: exact !important;  /*Firefox*/
        }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <!-- <div class="card-header">Important Notes</div>
                <div class="card-body">
                <div class="list-group-flush">
                    <div class="list-group-item custom-list-item-success border-bottom-0 mb-3">
                        <p>Please fill out all field carefully.</p>
                    </div>
                    <div class="list-group-item custom-list-item-danger">
                        <p>All fields are required.</p>
                    </div>
                </div> 
                </div> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <div class="d-flex">
                        <div class="w-100">
                            Print The ID Cart
                        </div>
                        <div>
                            <a href="Javascript:void(0)" onclick="print()">Print</a>
                        </div>
                    </div>
                </div> --}}
                
                <div class="card-body" id="contnet">
                    <div style="display:flex">
                        <div class="c-col-lg-6">
                            <div class="id-cart-container">
                                <div class="id-cart border" style="background:url({{asset('images/front_side2.png')}})">
                                    <div class="id-photo-container">
                                        <div class="img">
                                            <img src="{{asset($id_carts->photo)}}" alt="" class="id-image">
                                        </div>
                                    </div>
                                    <div class="name" style="font-family: 'Poppins', sans-serif">{{$id_carts->name}}</div>
                                    <div class="designation" style="font-family: sans-serif">{{ $id_carts->designation_name }}</div>
                                    <div class="info-group">
                                        <div class="d-flex id-no-con">
                                            <div class="id-no-label label">ID No.</div>
                                            <div class="id-no id-value"><span class="colon">:</span>{{$id}}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="dof-label label">DOF</div>
                                            <div class="dof id-value"><span class="colon">:</span>{{ \Carbon\Carbon::parse($id_carts->date_of_birth)->format('d/m/Y')}}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="email-label label">Email</div>
                                            <div class="email id-value"><span class="colon">:</span>{{$id_carts->email}}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="website-label label">Website</div>
                                            <div class="website id-value"><span class="colon">:</span>www.itcorneronline.com</div>
                                        </div>
                                    </div>
                                    <div class="barcode-container">
                                        <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo($id);?>&code=Code128&translate-esc=true&imagetype=Png&qunit=Mm&quiet=&hidehrt=True&dmsize=Default&eclevel=L" alt="Bar code">
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="c-col-lg-6" style="margin-left:3rem">
                            <div class="id-cart-container">
                                <div class="id-cart border" style="background:url({{asset('images/back-side2.png')}})">
                                    <div class="office-title">
                                        <span class="office">IT Corner</span> 
                                    </div>
                                    <div class="info-group-back">
                                        <div class="address">{{$id_carts->address}}</div>
                                       <div class="address-line-2"> {{$id_carts->address_line_2}}</div>
                                    </div>
                                    <div class="joining-info">
                                        <div class="d-flex">
                                            <div class="email-label label">JOIN</div>
                                            <div class="email id-value"><span class="colon">:</span>{{\Carbon\Carbon::parse($id_carts->joining_date)->format('d/m/Y')}}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="website-label label">EXPIRED</div>
                                            <div class="website id-value"><span class="colon">:</span>{{\Carbon\Carbon::parse($id_carts->expired_date)->format('d/m/Y')}}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="website-label label">Blood Group</div>
                                            <div class="website id-value"><span class="colon">:</span>{{$id_carts->blood_group}}</div>
                                        </div>
                                    </div>
                                    <div class="qr-cond">
                                        <img src="https://barcode.tec-it.com/barcode.ashx?data=www.itcorneronline.com&code=QRCode&eclevel=L" alt="QR Code">
                                        {{-- <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo($id)?>&code=QRCode&eclevel=L" alt="QR Code"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="toPdf"></div>
            </div>
        </div>
    </div>
</div>

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
    $(document).ready(function(){
        var info_width = $('.info-group').width();
        var idcart_width = $('.id-cart').width();
        var available_width = idcart_width - info_width;
        $('.info-group').css({
            'margin-left':(available_width/2)
        });
    });
    /*****************************
     * auto margin of id info
     *****************************/
    $(document).ready(function(){
        var info_width = $('.joining-info').width();
        var idcart_width = $('.id-cart').width();
        var available_width = idcart_width - info_width;
        $('.joining-info').css({
            'margin-left':(available_width/2)
        });
    });
    
</script>
@endsection