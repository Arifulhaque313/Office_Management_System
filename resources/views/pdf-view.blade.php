<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Paper</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
</head>
<body>
<div class="card-body">
    
    <style>
        .id-cart border{
            background:url(<?php echo url('/images/id_img.png'); ?>)
        }
        .container-pdf{
            /* background-color:red; */
            display:flex
        }
        .pdf-col-1{
            display:block;
            width: 50%;
            /* background:green; */
            float:left;
            margin-right:2rem;
			
        }
        .pdf-col-2{
            display:block;
            width: 50%;
            /* background:green; */
            float:left;
        
        }
		.w-60 {
	width: 60%;
}
form label {
	margin-bottom: 5px;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.9;
}
.custom-list-item-success {
	border-left: 5px solid #9cce86 !important;
	background-color: #9cce861f;
}
.custom-list-item-danger {
	border-left: 5px solid #db320b !important;
	background-color: #db320b0d;
}
.id-cart {
	width: 5.5cm !important;
	height: 8.7cm;
	background-position: center !important;
	background-size: cover !important;
	position: relative;
}
.name {
	position: absolute;
	top: 174px;
	text-align: center;
	width: 100%;
	font-size: 14px;
	font-family: poppins;
	color: #0A58A8;
	font-weight: bold;
	text-transform: uppercase;
}
.designation {
	position: absolute;
	top: 196px;
	width: 100%;
	text-align: center;
	font-family: century-gothic;
	font-size: 12px;
	text-transform: uppercase;
	color: #0E57A8;
}
.label {
	width: 59px;
	font-size: 8px;
	font-family: fira-sans;
}
.id-value {
	font-size: 8px;
	font-family: fira-sans;
}
.colon {
	padding-right: 3px;
}
.info-group {
	position: absolute;
	top: 224px;
}
.info-group {
	position: absolute;
	top: 224px;
    left:27px
	color: #39406D;
	width: auto;
}
.ui-datepicker-calendar {
	display: none;
 }
 .id-image {
	width: auto;
	transform: rotate(-46deg);
}
.id-photo-container {
	width: 82px;
	position: absolute;
	top: 62px;
	border: 8px solid #fff;
	transform: rotate(45deg);
	height: 82px;
	left: 69px;
	overflow: hidden;
}
.id-image {
	height: 100px !important;
	width: 100px !important;
	max-width: unset;
	position: absolute;
	top: -19px;
	left: -17px;
}
.office {
	position: absolute;
	top: 24px;
	text-align: center;
	display: block;
	width: 100%;
	text-transform: uppercase;
	font-size: 11px;
	font-family: Century Gothic;
	color: #074382;
}
.address,.address-line-2 {
	position: absolute;
	top: 37px;
	text-align: center;
	width: 100%;
	font-size: 11px;
	font-family: Century Gothic;
	color: #074382;
}
.address-line-2 {
	top: 52px;
}
.joining-info {
	position: absolute;
	top: 93px;
    left:45px;
	font-size: 11px;
	font-family: 'Century Gothic';
	color: #074382;
}
		.id-no-con{
			display: flex !important;
		}
        .info-table{
            margin-left:auto;
            margin-right:auto;
        }
        .id-cart{
            border:1px solid #bcc6ce;
        }
       
    </style>
    <style>
        <?php $fira = 'https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&display=swap' ?>
        /* (function_exists('curl_init')) ? http::fetch_content($url) : file_get_contents($url) */
        @import url(<?php echo($fira )?>);
        @import url(<?php echo (storage_path('/fonts/CenturyGothic.ttf'))?>);
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
    </style>
        <div class="container-pdf container" style="position:relative" id="divPrint">
        <input type="button" value="Print" onclick="JavaScript:print('divPrint');">
            <div class="pdf-col-1">
                <div class="id-cart-container">
                    <div class="id-cart border" style="background:url(<?php echo(asset('/images/id_img.png')) ?>)">
                        <div class="id-photo-container">
                            <div class="img">
                                <img src="{{asset($id_carts->photo)}}" alt="" class="id-image">
                            </div>
                        </div>
                        <div class="name" style="font-family: 'Fira Sans', sans-serif;">{{$id_carts->name}}</div>
                        <div class="designation" style="font-family: 'Century Gothic', sans-serif">software engineer</div>
                        <div class="info-group">
							<table class="info-table" style="font-family: 'Century Gothic', sans-serif">
                                <tr>
                                    <td>
                                        <div class="id-no-label label" style="font-family: 'Century Gothic', sans-serif">ID No.</div>
                                    </td>
                                    <td>
                                        <div class="id-no id-value"><span class="colon">:</span>{{$id}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="dof-label label">DOF</div>
                                    </td>
                                    <td>
                                        <div class="dof id-value"><span class="colon">:</span>{{ \Carbon\Carbon::parse($id_carts->date_of_birth)->format('d/m/Y')}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="email-label label">Email</div>
                                    </td>
                                    <td>
                                        <div class="email id-value"><span class="colon">:</span>{{$id_carts->email}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="website-label label">Website</div>
                                    </td>
                                    <td>
                                        <div class="website id-value"><span class="colon">:</span>www.itcorneronline.com</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="barcode-container">
                            <?php use Illuminate\Support\Facades\Http; ?>
                            <img src="https://barcode.tec-it.com/barcode.ashx?data=125463&code=Code128&translate-esc=true&imagetype=Png&qunit=Mm&quiet=&hidehrt=True&dmsize=Default&eclevel=L" alt="Bar code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pdf-col-2">
                <div class="id-cart-container" style="position:relative">
                    <div class="id-cart border" style="background:url(<?php echo(asset('/images/id_back_plane.png')) ?>); position:relative">
                        <div class="office-title">
                            <span class="office">IT Corner</span>
                        </div>
                        <div class="info-group-back">
                            <div class="address">{{$id_carts->address}}</div>
                            <div class="address-line-2"> {{$id_carts->address_line_2}}</div>
                        </div>
                        <div class="joining-info" id="joining-info">
                            <table class="joining-info-table">
                                <tr>
                                    <td><div class="email-label label">JOIN</div></td>
                                    <td>
                                        <div class="email id-value"><span class="colon">:</span>{{\Carbon\Carbon::parse($id_carts->joining_date)->format('d/m/Y')}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="website-label label">EXPIRED</div></td>
                                    <td>
                                        <div class="website id-value"><span class="colon">:</span>{{\Carbon\Carbon::parse($id_carts->expired_date)->format('d/m/Y')}}</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
             @media print {
            .id-cart {
                display: inline;
                background:url(<?php echo(asset('/images/id_back_plane.png')) ?>)
            }
        }
        </style>
    </div>
    
</body>
</html>