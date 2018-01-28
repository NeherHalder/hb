<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=Generator content="Microsoft Word 14 (filtered)">

    <title>চালান কপি | গণ গ্রন্থাগার</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body onload="window.print(); window.close();">

  <div class="container-fluid" style="margin-top: 10px; padding-left: 60px; padding-right: 60px;">
    <div class="row">
      <div class="col-md-12 text-center" style="font-size: 1.2em;">
        <h2>চালান ফরম</h2>
        <h4>টি, আর ফরম নং ৬ (এস, আর ৩৭ দ্রষ্টব্য)</h4>
        <p>
          চালান নং....................................
          তারিখ <span style="border-bottom: 1px dotted #000;padding-bottom: 2px;width: 300px;">
            {{ entobn(date('d/m/Y')) }}
          </span>
        </p>
        <br>
        <p class="text-left" style="font-size: .9em;">
          বাংলাদেশ ব্যাংক / সোনালী ব্যাংক লিমিটেডের ............................................... জেলার ........................................ শাখায় টাকা জমা দেওয়ার চালান
        </p>
        <div style="margin-top: 20px;" class="text-left">
          <ul class="list-inline">
            <li class="list-inline-item" style="margin-right: 40px;">কোড নং</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;margin-right: 40px;">১</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">৩</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">৪</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">৩</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;margin-right: 40px;">৫</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">০</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">০</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">০</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;margin-right: 40px;">০</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">২</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">৬</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">৮</li>
            <li class="list-inline-item" style="width: 30px; border: 1px solid #000;">১</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>যাহার মারফত প্রদত্ত হইলো তাহার নাম ও ঠিকানা</th>
              <th>যে ব্যাক্তি/প্রতিষ্ঠানের পক্ষ হইতে টাকা প্রদত্ত হইলো  তাহার নাম, পদবী ও ঠিকানা</th>
              <th>কি বাবদ জমা দেয়া হইলো তাহার বিবরণ</th>
              <th>মুদ্রা ও নোটের বিবরণ/ড্রাফট পে-অর্ডার ও চেকের বিবরণ</th>
              <th style="margin: 0; padding: 0; width: 20%;">
                <div style="width: 100%; border-bottom: 1px solid #e2e2e2;text-align: center; padding-bottom: 10px; padding-top: -50px;margin: 0;position: relative;">টাকার অংক</div>
                <div style="width: 100%;">
                  <div style="width: 70%; float: left; padding: 8px; border-right: 1px solid #e2e2e2;">টাকা</div>
                  <div style="width: 30%; float: left; padding: 8px;">পয়সা</div>
                </div>
              </th>
              <th>বিভাগের নাম এবং চালানের পৃষ্ঠাঙ্কনকারী কর্মকর্তার নাম, পদবী ও দপ্তর</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="vertical-align: middle; height: 160px; text-align: center;"></td>
              <td style="vertical-align: middle; height: 160px; text-align: center;">
                <strong>{{ $member->name }}</strong> <br>
                {{ $member->present_addr }}
              </td>
              <td style="vertical-align: middle; height: 160px; text-align: center;">
                লাইব্রেরি সদস্য হওয়ার জন্য আবেদন করা হইলো
              </td>
              <td style="vertical-align: middle; height: 160px; text-align: center;">
                (নগদ) <br>
                @if($member->type == 'general')
                  ৫০০/=
                @elseif($member->type == 'student')
                  ৩০০/=
                @else
                  ২০০/=
                @endif
              </td>
              <td style="vertical-align: middle; height: 160px;">
                @if($member->type == 'general')
                  ৫০০/=
                @elseif($member->type == 'student')
                  ৩০০/=
                @else
                  ২০০/=
                @endif
              </td>
              <td style="vertical-align: middle; height: 160px; text-align: center;"></td>
            </tr>
            <tr>
              <td colspan="3">

              </td>
              <td colspan="2">
                মোট টাকা
                <span style="margin-left: 120px;">
                  @if($member->type == 'general')
                  ৫০০/=
                  @elseif($member->type == 'student')
                    ৩০০/=
                  @else
                    ২০০/=
                  @endif
                </span>
              </td>
            </tr>
            <tr>
              <td colspan="3">
                টাকা (কথায়)
              </td>
            </tr>
            <tr>
              <td colspan="6" style="padding-top: 25px;">
                <span style="margin-top: 20px;">
                  তারিখ: {{ entobn(date('d/m/Y')) }}
                </span>
                <span class="pull-right" style="margin-right: 40px;">
                  <span class="text-center" style="margin-left: 70px; margin-bottom: 30px;">ম্যানেজার </span><br>
                  <span class="text-center">
                    বাংলাদেশ ব্যাংক / সোনালী ব্যাংক লিমিটেড
                  </span>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <span>
          নোট  : ১ | &nbsp;&nbsp;&nbsp;&nbsp;  সংশ্লিষ্ট দপ্তরের সহিত যোগাযোগ কোরিয়া সঠিক কোড নম্বর জানিয়া লইবেন |
        </span>
        <br><br>
        <span style="margin-left: 37px; margin-top: 10px;">
          ২ | &nbsp;&nbsp;&nbsp;* &nbsp;যে সকল ক্ষেত্রে কর্মকর্তা কর্তৃক পৃষ্ঠাঙ্কণ প্রয়োজন, সে সকল ক্ষেত্রে প্রযোজ্য হইবে |
        </span>
      </div>
    </div>
  </div>

</body>

</html>