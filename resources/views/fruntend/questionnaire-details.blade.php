<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Internify - Questionnaire Details</title>
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/css/questioner.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="questions-redbgbody questionsreddark">
  <div class="body_wht-inners ">
    <div class="redAbout_banner text-center contactus_banner fw">
      <div class="lgcontainer">
        <h2>Questionnaire Details</h2>
      </div>
    </div>
    @php
    //dd($questionnaires)
    $questionnairesData = DB::table('questionnaires')->where('user_id', $student_id)->orderBy('id', 'DESC')->first();
    @endphp
    <div class="questions-detailpg">
      <div class="lgcontainer">
        <div class="questions-boxbg">
          <span class="number-text">
            1.
          </span>
          <h3>How old are you?</h3>
          <p>{{ $questionnairesData->age }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            2.
          </span>
          <h3>What languages do you speak?</h3>
          <p>{{ $questionnairesData->languages }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            3.
          </span>
          <h3>How many hours can you work per day?</h3>
          <p>{{ $questionnairesData->work_hours }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            4.
          </span>
          <h3>How many days can you work per week?</h3>
          <p>{{ $questionnairesData->work_days }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            5.
          </span>
          <h3>Do you have experience with any specific tools or software? List them below!</h3>
          <p>{{ $questionnairesData->experience }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            6.
          </span>
          <h3>Are you willing to undergo a background check, in accordance to local law?</h3>
          <p>{{ $questionnairesData->background_check }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            7.
          </span>
          <h3>Are you willing to undergo a drug test, in accordance to local law?</h3>
          <p>{{ $questionnairesData->drug_test }}</p>
        </div>
        <div class="questions-boxbg">
          <span class="number-text">
            8.
          </span>
          <h3>Do you need a salary for this internship? If so, how much?</h3>
          <p>{{ $questionnairesData->salary_amount }}</p>
        </div>

      </div>
    </div>
  </div>

  <!-- <div class="se-pre-con"></div> -->
  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>


</body>

</html>