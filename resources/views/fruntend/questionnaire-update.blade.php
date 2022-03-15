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
        $languagesData = explode(',', $questionnairesData->languages);
        $languageData = DB::table('language_list')->get();
        @endphp
        <form action="{{ url('update-questionnaire') }}" method="POST" enctype="multipart/form-data" id="regForm">
            @csrf
            <div class="questions-detailpg">
                <div class="lgcontainer">
                    <div class="questions-boxbg">
                        <span class="number-text">
                            1.
                        </span>
                        <h3>How old are you?</h3>
                        <input type="text" class="form-control" name="age" value="{{ $questionnairesData->age }}">
                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            2.
                        </span>
                        <h3>What languages do you speak?</h3>
                        <select name="languages[]" id="languages" class="form-control" multiple>
                            @foreach($languageData as $language)
                            <option value="{{ $language->language_name}}" @if(in_array($language->language_name, $languagesData)) selected @endif>{{ $language->language_name}}</option>
                            @endforeach

                        </select>


                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            3.
                        </span>
                        <h3>How many hours can you work per day?</h3>
                        <select name="work_hours" id="work_hours" class="form-control">
                            <option value="1" {{ $questionnairesData->work_hours == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $questionnairesData->work_hours == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $questionnairesData->work_hours == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $questionnairesData->work_hours == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $questionnairesData->work_hours == 5 ? 'selected' : '' }}>5</option>
                            <option value="6" {{ $questionnairesData->work_hours == 6 ? 'selected' : '' }}>6</option>
                            <option value="7" {{ $questionnairesData->work_hours == 7 ? 'selected' : '' }}>7</option>
                            <option value="8" {{ $questionnairesData->work_hours == 8 ? 'selected' : '' }}>8</option>
                            <option value="9" {{ $questionnairesData->work_hours == 9 ? 'selected' : '' }}>9</option>
                            <option value="10" {{ $questionnairesData->work_hours == 10 ? 'selected' : '' }}>10</option>
                        </select>

                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            4.
                        </span>
                        <h3>How many days can you work per week?</h3>
                        <select name="work_days" id="work_days" class="form-control">
                            <option value="1" {{ $questionnairesData->work_days == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $questionnairesData->work_days == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $questionnairesData->work_days == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $questionnairesData->work_days == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $questionnairesData->work_days == 5 ? 'selected' : '' }}>5</option>
                            <option value="6" {{ $questionnairesData->work_days == 6 ? 'selected' : '' }}>6</option>
                        </select>

                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            5.
                        </span>
                        <h3>Do you have experience with any specific tools or software? List them below!</h3>

                        <input type="text" class="form-control" name="experience" value="{{ $questionnairesData->experience }}">

                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            6.
                        </span>
                        <h3>Are you willing to undergo a background check, in accordance to local law?</h3>
                        <select name="background_check" id="background_check" class="form-control">
                            <option value="Yes" {{ $questionnairesData->background_check == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $questionnairesData->background_check == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            7.
                        </span>
                        <h3>Are you willing to undergo a drug test, in accordance to local law?</h3>
                        <select name="drug_test" id="drug_test" class="form-control">
                            <option value="Yes" {{ $questionnairesData->drug_test == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $questionnairesData->drug_test == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="questions-boxbg">
                        <span class="number-text">
                            8.
                        </span>
                        <h3>Do you need a salary for this internship? If so, how much?</h3>
                        <input type="text" class="form-control" name="salary_amount" value="{{ $questionnairesData->salary_amount }}">
                    </div>
                    <button type="submit">Update</button>
                </div>
            </div>


        </form>
    </div>

    <!-- <div class="se-pre-con"></div> -->
    <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
    <script src="{{ asset('public/assets/web_assets/js/commen-hd.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>


</body>

</html>