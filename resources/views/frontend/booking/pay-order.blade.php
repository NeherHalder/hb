@extends('layouts.frontend.master')

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		@if(Session::has('payorder'))
			{{ Session::get('payorder') }}
		@else
			বুকিংয়ের পেঅর্ডার প্রিন্ট করুন
		@endif	
	</h5>
	<p>&nbsp;</p>
	<div style="margin-left: 12px;margin-right: 12px;">
		<p><strong>{!! language('Second Message: </strong>After submission the application along with pay order(security money).', 'পেঅর্ডার (নিরাপত্তা অর্থ) ব্যাংকে জমা দিন এবং কর্তৃপক্ষের সাথে যোগাযোগ করুন') !!}</p>
		<div id="print">
		    <div style="width: 100%; border: 1px solid; padding: 30px; box-sizing: border-box; float: left; margin-top: 10px;">
		        <div style="float: left; width: 100%;">
		            <h2 style="text-align: center; margin: 0px; padding: 0px">PUBALI BANK LIMITED</h2>
		        </div>
		        <div style="float: left; width: 100%;;">
		            <h5 style="text-align: center;  margin: 0px; padding: 0px;">...................................................Branch</h5>
		            <p style="text-align: right; margin: 0px; padding: 0px;">Date: {{ \Carbon\Carbon::now()->format('m/d/Y') }}</p>
		            <p style="text-align: center; margin: 0px; padding: 0px; font-weight: bold;"><u>DD/MT/PO APPLICATION FORM</u></p>
		            <p style="margin: 0px; padding: 0px;"><strong>Please issue a DD/MT/PO for Tk.</strong>...................................................................................</p>
		            <p style="margin: 0px; padding: 0px;">Taka(in Words)....................................................................................................................</p>
		            <p style="margin: 0px; padding: 0px;">on your.....................................................Branch................................................................</p>
		            <p style="text-align: right; margin: 0px; padding: 0px;">.................................................</p>
		            <p style="text-align: right; margin: 0px; padding: 0px;">Signature of the Applicant</p>
		            <div style="width: 32%; float: left;">
		                <p style="margin: 0px; padding: 0px;"><strong>&nbsp;&nbsp;&nbsp; Issued DD/MT/PO No.</p>
		                <div style="width: 80%; float: left; height: 30px;border: 1px solid;">
		                </div>

		            </div>
		            <div style="width: 68%; float: left; font-weight: normal;">
		                <p>Name of the Applicant: &nbsp;&nbsp;&nbsp;<span>{{ $booking->applicant_name }}</span></p>
		                <p>Address:&nbsp;&nbsp;&nbsp;<span>{{ $booking->address }}</p>
		            </div>
		            <div style="width: 100%; float: left; border: 1px solid; margin-top: 5px; box-sizing: border-box">
		                <div style="width: 36%; float: left; border-right: 1px solid; border-bottom: 1px solid; padding: 5px;">
		                    <p style="text-align: center"><strong>In favour of</strong></p>
		                </div>
		                <div style="width: 19%; float: left; border-right: 1px solid; border-bottom: 1px solid; padding: 5px;">
		                    <p style="text-align: center"><strong>Amount</strong></p>
		                </div>
		                <div style="width: 19%; float: left; border-right: 1px solid; border-bottom: 1px solid; padding: 5px;">
		                    <p style="text-align: center"><strong>Commission</strong></p>
		                </div>
		                <div style="width: 19.4%; float: left; border-bottom: 1px solid; padding: 5px;">
		                    <p style="text-align: center"><strong>Total Amount</strong></p>
		                </div>
		                <div style="width: 36%; float: left; border-right: 1px solid;  padding: 5px; height: 120px;">
		                    <p style="text-align: center">{{ $booking->applicant_name }}</p>
		                </div>
		                <div style="width: 19%; float: left; border-right: 1px solid;  padding: 5px; height: 120px;">             
		                </div>
		                <div style="width: 19%; float: left; border-right: 1px solid; padding: 5px; height: 120px;">
		                    <p style="text-align: center"></p>
		                </div>
		                <div style="width: 19.4%; float: left; padding: 5px; height: 120px;">
		                    <p style="text-align: center"></p>
		                </div>
		            </div>
		            <div style="width: 32%; float: left; margin-top: 5px;">
		                <div style="width: 50%; float: left; height: 50px;border: 1px solid;">
		                    <p style="text-align: center; border-bottom: 1px solid; margin: 0px;"> Scroll No.</p>
		                </div>

		            </div>
		            <div style="width: 68%; float: left; font-weight: normal; margin-top: 5px;">
		                <p style="text-align: right; font-style: italic; font-weight: bold">Received the DD/PO, as above.</p>
		            </div>        
		        </div>
		        <div  style="float: left;width: 100%; font-weight: normal; margin-top: 10px;">
		            <div style="float: left;width: 15%;">
		                <p><strong>GF-13</strong></p>
		            </div>
		            <div style="float: left;width: 25%; text-align: center">
		                <p>...............................</p>
		                <p>Cashier</p>
		            </div>
		            <div style="float: left;width: 20%; text-align: center">
		                <p>...............................</p>
		                <p>Officer</p>
		            </div>
		            <div style="float: left;width: 40%; text-align: right">
		                <p>...............................................</p>
		                <p>Signature of the Receiver</p>
		            </div>
		        </div>
		    </div>
		</div>
		<button class="btn btn-info" type="button" style="border: 2px solid blue; float: right; margin-bottom: 8px; margin-top: 5px; color: black" onclick="printer2('print')">Print</button>
	</div>
</div>
@stop

@section('script')
	<script type="text/javascript">
	    function printer2(id) {
	        var content = document.getElementById(id).innerHTML;
	        document.body.style.margin = '50px 5%';
	        document.body.innerHTML = content;
	        window.print();
	    }
	</script>
@endsection