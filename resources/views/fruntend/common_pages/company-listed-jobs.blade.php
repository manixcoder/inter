<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>internify - Home</title>
    <!-- Fontawesome 4 Cdn from BootstrapCDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('public/assets/web_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/web_assets/fonts/fonts.css')}}" rel="stylesheet">
</head>

<body class="lightwht_bg">
    <header class="header_sec flow2_header fw">
        <div class="lgcontainer">
            @include('fruntend.student.inc.top-menu')
            <?php
            // echo "<pre>";
            // print_r($OrgData);
            // die;
            ?>
        </div>
    </header>
    <div class="body_wht-inners ">
        <div class="lgcontainer">
            <div class="boxDetailbg fw">
                <figure>
                    <img src="{{ asset('public/uploads')}}/{{ $OrgData->org_image }}" alt="jobs" />
                </figure>
            </div>
            <div class="compnayProfile_user fw">
                <div class="userBox_img">
                    @if($OrgData->profile_image !='')
                    <img src="{{ asset('public/uploads')}}/{{ $OrgData->profile_image }}" alt="icon_logo" />
                    @else
                    <img src="{{ asset('public/uploads/placeholder.png') }}" alt="icon_logo" />
                    @endif
                </div>
            </div>
            <div class="tabCompnay_profile text-center fw">
                <ul class="profileTab" id="profileTab_link">
                    <li class="{{ request()->is('company-profile') ? 'active' : '' }}">
                        <form method="post" action="{{ url('company-profile') }}">
                            @csrf
                            <input type="hidden" name="comp_id" value="{{ $OrgData->id }}">
                            <button type="submit">About</button>
                        </form>
                        <!-- <a href="{{url('company-info/'.$OrgData->id)}}">About</a> -->
                    </li>
                    <!-- <li class="{{ request()->is('company-posts') ? 'active' : '' }}">
                        <form method="post" action="{{ url('company-posts') }}">
                            @csrf
                            <input type="hidden" name="comp_id" value="{{ $OrgData->id }}">
                            <button type="submit">Posts</button>
                        </form>
                    </li> -->
                    <li class="{{ request()->is('company-listed-jobs') ? 'active' : '' }}">
                        <form method="post" action="{{ url('company-listed-jobs') }}">
                            @csrf
                            <input type="hidden" name="comp_id" value="{{ $OrgData->id }}">
                            <button type="submit">Listed Jobs</button>
                        </form>
                        <!-- <a href="#profileTab_link3">Listed Jobs</a> -->
                    </li>
                    <!--li>
                        <a href="#profileTab_link4">Followers</a>
                    </li>
                    <li>
                        <a href="#profileTab_link5">People</a>
                    </li -->
                </ul>
                <div class="profileTab_contBox" id="profileTab_link3">
                    <div class="small_contaner">
                        <div class="fw profilePost_wapper listjob_wapper">
                            <?php
                            $jobsData = DB::table('jobs')->where('user_id', $OrgData->id)->orderBy('id', 'DESC')->get();
                            foreach ($jobsData as $jobs) {
                            ?>
                                <div class="jobsDetailBox fw">
                                    <div class="profile_sec fw">
                                        <div class="compnayBoxImg">
                                            <img src="{{ URL::asset('/public/uploads/') }}/{{ $jobs->logo }}" alt="images" />
                                        </div>
                                        <div class="compnay">
                                            <h5>{{ $jobs->job_title}}</h5>
                                            <span>
                                                {{ \Carbon\Carbon::parse( $jobs->created_at )->toDayDateTimeString() }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="jobsDetailCont fw">
                                        <h3>{{ $jobs->location }}</h3>
                                        <p><a href="#" class="lightblue_text">{{ $jobs->job_title}}</a></p>
                                        <div class="innerrow">
                                            <div class="col_grid9">
                                                <ul>
                                                    @foreach(unserialize($jobs->offer) as $offer)
                                                    <li>{{ $offer }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col_grid3">
                                                <a href="{{url('student-job-details/'.$jobs->id)}}" class="input-btn redBGmanage_btn ">View Job</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- div class="jobsDetailBox fw">
                                <div class="profile_sec fw">
                                    <div class="compnayBoxImg">
                                        <img src="{{ asset('public/assets/images/header-logo.svg')}}" alt="images" />
                                    </div>
                                    <div class="compnay">
                                        <h5>New Delhi</h5>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                                <div class="jobsDetailCont fw">
                                    <h3>Quess Private Limited</h3>
                                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                                    <div class="innerrow">
                                        <div class="col_grid9">
                                            <ul>
                                                <li>Great opportunity for freshers to kickstart their career</li>
                                                <li>Be part of a dynamic and supportive work environment</li>
                                            </ul>
                                        </div>
                                        <div class="col_grid3">
                                            <a href="#" class="input-btn redBGmanage_btn ">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobsDetailBox fw">
                                <div class="profile_sec fw">
                                    <div class="compnayBoxImg">
                                        <img src="{{ asset('public/assets/images/newtechlogo.png')}}" alt="images" />
                                    </div>
                                    <div class="compnay">
                                        <h5>Mumbai</h5>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                                <div class="jobsDetailCont fw">
                                    <h3>ARK Newtech Private Limited</h3>
                                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                                    <div class="innerrow">
                                        <div class="col_grid9">
                                            <ul>
                                                <li>Great opportunity for freshers to kickstart their career</li>
                                                <li>Be part of a dynamic and supportive work environment</li>
                                            </ul>
                                        </div>
                                        <div class="col_grid3">
                                            <a href="#" class="input-btn redBGmanage_btn ">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobsDetailBox fw">
                                <div class="profile_sec fw">
                                    <div class="compnayBoxImg">
                                        <img src="{{ asset('public/assets/images/newtechlogo.png')}}" alt="images" />
                                    </div>
                                    <div class="compnay">
                                        <h5>Mumbai</h5>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                                <div class="jobsDetailCont fw">
                                    <h3>ARK Newtech Private Limited</h3>
                                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                                    <div class="innerrow">
                                        <div class="col_grid9">
                                            <ul>
                                                <li>Great opportunity for freshers to kickstart their career</li>
                                                <li>Be part of a dynamic and supportive work environment</li>
                                            </ul>
                                        </div>
                                        <div class="col_grid3">
                                            <a href="#" class="input-btn redBGmanage_btn ">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobsDetailBox fw">
                                <div class="profile_sec fw">
                                    <div class="compnayBoxImg">
                                        <img src="{{ asset('public/assets/images/newtechlogo.png')}}" alt="images" />
                                    </div>
                                    <div class="compnay">
                                        <h5>Mumbai</h5>
                                        <span>2 days ago</span>
                                    </div>
                                </div>
                                <div class="jobsDetailCont fw">
                                    <h3>ARK Newtech Private Limited</h3>
                                    <p><a href="#" class="lightblue_text">Junior Associate - SAS Programming</a></p>
                                    <div class="innerrow">
                                        <div class="col_grid9">
                                            <ul>
                                                <li>Great opportunity for freshers to kickstart their career</li>
                                                <li>Be part of a dynamic and supportive work environment</li>
                                            </ul>
                                        </div>
                                        <div class="col_grid3">
                                            <a href="#" class="input-btn redBGmanage_btn ">View Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div -->
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <footer class="fw">
        @include('fruntend.student.inc.footer')
    </footer>
    <div class='modal resumeUpload_popup successfullyModalPopup' id='successfullyModal'>

        <div class='content fw'>
            <div class="imgcheck_icon fw">
                <img src="{{ asset('public/assets/images/verified.png') }}" alt="icon" />
            </div>
            <h3 class="">Job Applied Successfully</h3>
            <p>Recruiter will contact you through <br />your email or mobile number.</p>
        </div>
    </div>
    <script src="{{ asset('public/assets/web_assets/js/jquery-lb.js')}}"></script>

    <script>
        $('#profileTab_link > li').click(function() {
            $(this).addClass('active').siblings().removeClass('active')
        })
    </script>
    <script type="text/javascript">
        function editRecords(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('likefilter/')}}" + '/' + id,
                method: "GET",
                contentType: 'application/json',
                success: function(data) {
                    var url = window.location.href;
                    $(".lightwht_bg").load(url);
                }
            });
        }
    </script>
    <script type="text/javascript">
        function editRecords(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('likefilter/')}}" + '/' + id,
                method: "GET",
                contentType: 'application/json',
                success: function(data) {
                    var url = window.location.href;
                    $(".lightwht_bg").load(url);
                }
            });
        }
    </script>
    <script>
        $('.menu_right li').click(function() {
            $('.menu_right li').removeClass('active');
            $(this).addClass('active');
        });

        $(document).ready(function() {
            $('.commentbyopne').on('click', function() {
                $(this).removeClass('opencomments-active').addClass('opencomments-active');
            });
            $('.closebtn').on('click', function() {
                $('.commentbyopne').removeClass('opencomments-active');
            });
        });
        $(document).ready(function() {
            $('.shareclickon').on('click', function() {
                $(this).removeClass('shareclickon-active').addClass('shareclickon-active');
            });
            $('.shareclosebtn').on('click', function() {
                $('.shareclickon').removeClass('shareclickon-active');
            });
        });

        $('.close-modal').click(function() {
            location.reload();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".clicktobtm").click(function() {
                $("html, body").animate({
                    scrollTop: $(
                        'html, body').get(0).scrollHeight
                }, 2000);
            });
        });
    </script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 1000) {
                $("body").addClass("blogLoginFixed_sec");
            } else {
                $("body").removeClass("blogLoginFixed_sec");
            }
        });
        $(".modal").each(function() {
            $(this).wrap('<div class="popupWapper"></div>')
        });

        $(".open-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).parents(".popupWapper").addClass("open");
            setTimeout(function() {
                $(modal).addClass("open");
            }, 350);

            $(document).on('click', function(e) {
                var target = $(e.target);

                if ($(target).hasClass("popupWapper")) {
                    $(target).find(".modal").each(function() {
                        $(this).removeClass("open");
                    });
                    setTimeout(function() {
                        $(target).removeClass("open");
                    }, 350);
                }

            });

        });

        $(".close-modal").on('click', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation;

            var $this = $(this),
                modal = $($this).data("modal");

            $(modal).removeClass("open");
            setTimeout(function() {
                $(modal).parents(".popupWapper").removeClass("open");
            }, 350);

        });
    </script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 50) {
                $("body").addClass("body_blog");
            } else {
                $("body").removeClass("body_blog");
            }
        });
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 50) {
                $("body").addClass("flow2header");
            } else {
                $("body").removeClass("flow2header");
            }
        });
        $(document).ready(function() {
            $(".header_sec .togglebtn").click(function() {
                $(".header_sec ").toggleClass("opne_flow2header");
            });
        });

        // Iterate over each select element
        $('select').each(function() {

            // Cache the number of options
            var $this = $(this),
                numberOfOptions = $(this).children('option').length;

            // Hides the select element
            $this.addClass('s-hidden');

            // Wrap the select element in a div
            $this.wrap('<div class="select"></div>');

            // Insert a styled div to sit over the top of the hidden select element
            $this.after('<div class="styledSelect"></div>');

            // Cache the styled div
            var $styledSelect = $this.next('div.styledSelect');

            // Show the first select option in the styled div
            $styledSelect.text($this.children('option').eq(0).text());

            // Insert an unordered list after the styled div and also cache the list
            var $list = $('<ul />', {
                'class': 'options'
            }).insertAfter($styledSelect);

            // Insert a list item into the unordered list for each select option
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            // Cache the list items
            var $listItems = $list.children('li');

            // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.styledSelect.active').each(function() {
                    $(this).removeClass('active').next('ul.options').hide();
                });
                $(this).toggleClass('active').next('ul.options').toggle();
            });

            // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
            // Updates the select element to have the value of the equivalent option
            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                /* alert($this.val()); Uncomment this for demonstration! */
            });

            // Hides the unordered list when clicking outside of it
            $(document).click(function() {
                $styledSelect.removeClass('active');
                $list.hide();
            });

        });
    </script>

    <script>
        $('#profileTab_link li a:not(:first)').addClass('inactive');
        $('.profileTab_contBox').hide();
        $('.profileTab_contBox:first').show();
        $('#profileTab_link li a').click(function() {
            var t = $(this).attr('href');
            $('#profileTab_link li a').addClass('inactive');
            $(this).removeClass('inactive');
            $('.profileTab_contBox').hide();
            $(t).fadeIn('slow');
            return false;
        })

        if ($(this).hasClass('inactive')) { //this is the start of our condition 
            $('#profileTab_link li a').addClass('inactive');
            $(this).removeClass('inactive');
            $('.profileTab_contBox').hide();
            $(t).fadeIn('slow');
        }
    </script>
    <script>
        $(' .menu_right li').click(function() {
            $(' .menu_right li').removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>