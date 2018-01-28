@extends('layouts.frontend.master')

@section('style')
<style>
    <style>
        .rslides_tabs {
            list-style: none;
            box-shadow: 0 0 1px rgba(255,255,255,.3), inset 0 0 5px rgba(0,0,0,1.0);
            font-size: 18px;
            list-style: none;
            margin: 0 auto 50px;
            max-width: 540px;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }
        .rslides_tabs a {
            padding: 8px 10px 8px 0px;
        }

    </style>
</style
@endsection

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		{{ getRoom($room) }}
	</h5>
	<p>&nbsp;</p>
	<div style="margin: 15px;">
		<div class="conference-slider">
            <!-- Slideshow 3 -->
            <ul class="conference-rslide" id="conference-slider">
                @if(Request::segment(2) != 'shoukot-osman')
                    <li><img src="{{ asset('img/c4.jpg') }}" alt=""></li>       
                    <li><img src="{{ asset('img/c5.jpg') }}" alt=""></li>   
                    <li><img src="{{ asset('img/c9.jpg') }}" alt=""></li>
                @else
                    <li><img src="{{ asset('img/pic1.jpg') }}" alt=""></li>       
                    <li><img src="{{ asset('img/pic2.jpg') }}" alt=""></li>   
                    <li><img src="{{ asset('img/pic3.jpg') }}" alt=""></li>
                @endif
            </ul>
            <!-- Slideshow 3 Pager -->
            <ul id="slider3-pager">
                @if(Request::segment(2) != 'shoukot-osman')
                    <li><a href="#"><img src="{{ asset('img/c4.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('img/c5.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('img/c9.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>    
                @else
                    <li><a href="#"><img src="{{ asset('img/pic1.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('img/pic2.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('img/pic3.jpg') }}" style="width: 70px;height: 60px" alt=""></a></li>
                @endif  
            </ul>
        </div> 
        <div class="det_text">
            <b><br/>
                @if(Request::segment(2) != 'shoukot-osman')
                    <p>গণগ্রন্থাগার অধিদপ্তরের সেমিনার কক্ষ বলতে নীচতলা ও দ্বিতীয় তলার সেমিনার কক্ষের কেবলমাত্র ভিতরের নির্ধারিত অংশকেই বুঝাবে। কোন বানিজ্যিক উদ্দেশ্যে সৃষ্ট নয় বিধায় এবং গ্রন্থাগারের সামগ্রিক শিক্ষামূলক ও পাঠ পরিবেশ যথাযথ বজায় রাখার স্বার্থে কিছু শর্ত সাপেক্ষে সেমিনার কক্ষ দুটির ব্যবহার নিম্নলিখিত ক্ষেত্রসমূহের মর্ধে সীমাবদ্ধ থাকবেঃ</p>
                    <br/>
                    <p>ক)   শিক্ষা, পুস্তক প্রকাশনা, পুস্তক প্রদর্শনী, গ্রন্থ কিংবা গ্রন্থাগার সম্পর্কিত উন্নয়নমূলক অনুষ্ঠানাদি। </p>
                    <p>খ)   বিশিষ্ট ব্যক্তিবর্গেও স্মরণে আয়োজিত অনুষ্ঠান। </p>
                    <p>গ)   আবৃত্তি, হাতের লেখা প্রতিযোগিতা, সাহিত্য সমালোচনা, চিত্রাংকন প্রদর্শনী ও প্রতিযোগিতা, পুস্তকপাঠ প্রতিযোগিতা ইত্যাদি। </p>
                    <p>ঘ)   ছোট আকারের সেমিনার, সিম্পোজিয়াম, ওয়ার্কশপ, বিশেষ দিবস উপলক্ষে আলোচনা অনুষ্ঠান ইত্যাদি। </p>
                @else
                    <p>গণগ্রন্থাগার অধিদপ্তরের শওকত ওসমান স্মৃতি মিলনায়তন বলতে সেমিনার কক্ষের কেবলমাত্র ভিতরের নির্ধারিত অংশকেই বুঝাবে। কোন বানিজ্যিক উদ্দেশ্যে সৃষ্ট নয় বিধায় এবং গ্রন্থাগারের সামগ্রিক শিক্ষামূলক ও পাঠ পরিবেশ যথাযথ বজায় রাখার স্বার্থে কিছু শর্ত সাপেক্ষে সেমিনার কক্ষ দুটির ব্যবহার নিম্নলিখিত ক্ষেত্রসমূহের মর্ধে সীমাবদ্ধ থাকবেঃ</p>
                    <br/>
                    <p>ক)   শিক্ষা, পুস্তক প্রকাশনা, পুস্তক প্রদর্শনী, গ্রন্থ কিংবা গ্রন্থাগার সম্পর্কিত উন্নয়নমূলক অনুষ্ঠানাদি। </p>
                    <p>খ)   বিশিষ্ট ব্যক্তিবর্গেও স্মরণে আয়োজিত অনুষ্ঠান। </p>
                    <p>গ)   আবৃত্তি, হাতের লেখা প্রতিযোগিতা, সাহিত্য সমালোচনা, চিত্রাংকন প্রদর্শনী ও প্রতিযোগিতা, পুস্তকপাঠ প্রতিযোগিতা ইত্যাদি। </p>
                    <p>ঘ)   ছোট আকারের সেমিনার, সিম্পোজিয়াম, ওয়ার্কশপ, বিশেষ দিবস উপলক্ষে আলোচনা অনুষ্ঠান ইত্যাদি। </p>
                @endif
            </b>         
        </div>
	</div>
</div>
@stop

@section('script')
    <script>
        $(function () {
            $("#conference-slider").responsiveSlides({
                auto: true,
                manualControls: '#slider3-pager',
            });
        });
    </script>
@endsection