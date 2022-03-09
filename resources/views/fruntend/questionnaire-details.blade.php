<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Internify - Questionnaire</title>
  <!-- Fontawesome 4 Cdn from BootstrapCDN -->
  <link rel="icon" type="image/png" href="{{ URL::asset('/public/uploads/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/web_assets/css/questioner.css')}}" rel="stylesheet">
  <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="questions-redbgbody ">
  <div class="questions-sec">
    <div class="questions-middle">
      <!-- <h2>Hello!</h2>
            <p>Fill out a few questions so we can macth you to the best and most relevant employers. (This will be submitted to every employer you apply to for an intership)</p>
            <div class="questions-btnsec">
              <button type="submit" class="whait-btn">NEXT</button>
            </div> -->

      <form action="{{ url('save-questionnaire') }}" method="POST" enctype="multipart/form-data" id="regForm">
        @csrf
        <div class="tab step1-box">
          <h2>Hello!</h2>
          <p>Fill out a few questions so we can match you to the <br /> best and most relevant employers. (This will be submitted to every employer you apply to for an <br /> internship) </p>


        </div>
        <div class="tab step2-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>1. How old are you?</h4>
            <div class="form-group">
              <input type="text" name="age" placeholder="Type your answer here..." class="form-control" />
            </div>
          </div>
        </div>
        <div class="tab step3-box">
          @php
          $languageData = DB::table('language_list')->get();
          @endphp
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>2. What languages do you speak?</h4>
            <div class="form-group">
              <!-- <select class="form-control" name="">
                <option value="">Type or select an option 0</option>
                <option>Type or select an option 1 </option>
                <option>Type or select an option 2</option>
                <option>Type or select an option 3</option>
              </select> -->

              <select class="form-control selectpicker" id="select-country" data-live-search="true" multiple name="languages[]">
                @foreach($languageData as $language)
                <option data-tokens="{{ $language->language_name}}" value="{{ $language->language_name}}">{{ $language->language_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="tab step4-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>
              3. Will you be able to bring your own laptop or phone to the internship (depending on the needs of your employer)?
            </h4>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="accessories" value="Yes, both">
                <div class="questionr-opction">
                  <span>A</span> Yes, both
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="accessories" value="Yes, leptop">
                <div class="questionr-opction">
                  <span>B</span> Yes, leptop
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="accessories" value="Yes, phone">
                <div class="questionr-opction">
                  <span>C</span> Yes, phone
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="accessories" value="No, None">
                <div class="questionr-opction">
                  <span>D</span> No, none
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab step5-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>4. How many hours can you work per day?</h4>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="1">
                <div class="questionr-opction">
                  1
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="2">
                <div class="questionr-opction">
                  2
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="3">
                <div class="questionr-opction">
                  3
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="4">
                <div class="questionr-opction">
                  4
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="5">
                <div class="questionr-opction">
                  5
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="6">
                <div class="questionr-opction">
                  6
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="7">
                <div class="questionr-opction">
                  7
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="8">
                <div class="questionr-opction">
                  8
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="9">
                <div class="questionr-opction">
                  9
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_hours" value="10">
                <div class="questionr-opction">
                  10
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab step5-box step6-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>5. How many days can you work per week?</h4>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="1">
                <div class="questionr-opction">
                  1
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="2">
                <div class="questionr-opction">
                  2
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="3">
                <div class="questionr-opction">
                  3
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="4">
                <div class="questionr-opction">
                  4
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="5">
                <div class="questionr-opction">
                  5
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="work_days" value="6">
                <div class="questionr-opction">
                  6
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab step7-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>
              6. Do you have experience with any specific tools or software? List them below!
            </h4>
            <div class="form-group">
              <input type="text" name="experience" placeholder="Type your answer here..." class="form-control" />
            </div>
          </div>
        </div>
        <div class="tab step8-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>7. Are you willing to undergo a background check, in accordance to local law?</h4>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="background_check" value="Yes">
                <div class="questionr-opction">
                  <span>Y</span> Yes
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="background_check" value="No">
                <div class="questionr-opction">
                  <span>N</span> No
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab step9-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>8. Are you willing to undergo a drug test, in accordance to local law?</h4>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="drug_test" value="Yes">
                <div class="questionr-opction">
                  <span>Y</span> Yes
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox-questionr">
                <input type="radio" class="inputcheckbox" name="drug_test" value="No">
                <div class="questionr-opction">
                  <span>N</span> No
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab step10-box">
          <h3>Questionnaire</h3>
          <div class="text-ecnter">
            <h4>
              9. Do you need a salary for this internship? If so, how much?
              <br />
              <small>
                (Note: This limits the number of internship options that suit you)
              </small>
            </h4>
            <div class="form-group">
              <input type="text" placeholder="Type your answer here..." name="salary_amount" class="form-control" />
            </div>
          </div>
        </div>
        <div class="tab step11-box">
          <h2>Thank you!</h2>
          <p>That's all, you're all set! This will help us match you to <br /> relevant employers</p>
        </div>
        <div style="overflow:auto;">
          <div class="questions-btnsec">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">
              <img class="rightcheck previous-btn" src="{{ asset('public/assets/images/logininput_right.png')}}" />
              Previous
            </button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">
              Next
              <img class="rightcheck" src="{{ asset('public/assets/images/loginCheck_icon.png')}}" />
            </button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="visibility: hidden; width: 100%;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


  <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>
  <!-- jQuery easing plugin -->
  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit!";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next &#10004;";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>

  <script>
    $(function() {
      $('.selectpicker').selectpicker();
    });
  </script>

</body>

</html>