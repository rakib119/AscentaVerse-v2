<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{ENV('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">
    <link rel="icon" href="assets/images/favicon.png">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/night-mode.css">
    <link rel="stylesheet" href="assets/css/framework.css">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="assets/css/icons.css">

    <!-- Google font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- sidebar -->
        <div class="main_sidebar">
            <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>

            <!-- sidebar header -->
            <div class="sidebar-header">
                <h4> Navigation</h4>
                <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
            </div>

            <!-- sidebar Menu -->
            <div class="sidebar">
                <div class="sidebar_innr" data-simplebar>

                    <div class="sections">
                        <ul>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets//images/icons/home.png" alt="">
                                    <span> Feed </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/chat.png" alt="">
                                    <span> Chats </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/flag.png" alt="">
                                    <span> Pages </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/video.png" alt="">
                                    <span> Videos </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/group.png" alt="">
                                    <span> Groups </span> </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/pen.png" alt="">
                                    <span> Courses </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/info.png" alt="">
                                    <span> Questions </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/bag.png" alt="">
                                    <span> jobs </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/book.png" alt="">
                                    <span> Books </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/friends.png" alt="">
                                    <span> Friends </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/document.png" alt="">
                                    <span> Blogs </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/market.png" alt="">
                                    <span> Marketplace </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/photo.png" alt="">
                                    <span> Gallery </span>
                                </a>
                            </li>
                            <li id="more-veiw" hidden>
                                <a href="{{ route('social.home')}}"> <img src="assets/images/icons/events.png" alt="">
                                    <span> Events </span>
                                </a>
                            </li>
                        </ul>

                        <a href="#" class="button secondary px-5 btn-more"
                            uk-toggle="target: #more-veiw; animation: uk-animation-fade">
                            <span id="more-veiw">See More <i class="icon-feather-chevron-down ml-2"></i></span>
                            <span id="more-veiw" hidden>See Less<i class="icon-feather-chevron-up ml-2"></i> </span>
                        </a>

                    </div>


                    <div class="sections">
                        <h3> Shortcut </h3>
                        <ul>
                            <li> <a href="{{ route('social.home')}}"> <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    <span> Stella Johnson </span> <span class="dot-notiv"></span></a></li>
                            <li> <a href="{{ route('social.home')}}"> <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    <span> Alex Dolgove </span> <span class="dot-notiv"></span></a></li>
                            <li> <a href="{{ route('social.home')}}"> <img src="assets/images/avatars/avatar-7.jpg" alt="">
                                    <span> Adrian Mohani </span> </a>
                            </li>
                            <li id="more-veiw-2" hidden> <a href="{{ route('social.home')}}">
                                    <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                    <span> Erica Jones </span> <span class="dot-notiv"></span></a>
                            </li>
                            <li> <a href="group-{{ route('social.home')}}"> <img src="assets/images/group/group-3.jpg" alt="">
                                    <span> Graphic Design </span> </a>
                            </li>
                            <li> <a href="group-{{ route('social.home')}}"> <img src="assets/images/group/group-4.jpg" alt="">
                                    <span> Mountain Riders </span> </a>
                            </li>
                            <li id="more-veiw-2" hidden> <a href="{{ route('social.home')}}"> <img
                                        src="assets/images/avatars/avatar-5.jpg" alt="">
                                    <span> Alex Dolgove </span> <span class="dot-notiv"></span></a>
                            </li>
                            <li id="more-veiw-2" hidden> <a href="{{ route('social.home')}}"> <img
                                        src="assets/images/avatars/avatar-7.jpg" alt="">
                                    <span> Adrian Mohani </span> </a>
                            </li>
                        </ul>

                        <a href="#" class="button secondary px-5 btn-more"
                            uk-toggle="target: #more-veiw-2; animation: uk-animation-fade">
                            <span id="more-veiw-2">See More <i class="icon-feather-chevron-down ml-2"></i></span>
                            <span id="more-veiw-2" hidden>See Less<i class="icon-feather-chevron-up ml-2"></i> </span>
                        </a>

                    </div>


                    <!--  Optional Footer ->
            <div id="foot">

                <ul>
                    <li> <a href="page-{{ route('social.home')}}"> About Us </a></li>
                    <li> <a href="page-{{ route('social.home')}}"> Setting </a></li>
                    <li> <a href="page-{{ route('social.home')}}"> Privacy Policy </a></li>
                    <li> <a href="page-{{ route('social.home')}}"> Terms - Conditions </a></li>
                </ul>


                <div class="foot-content">
                    <p>© 2019 <strong>Socialite</strong>. All Rights Reserved. </p>
                </div>

            </div> -->



                </div>


            </div>

        </div>

        <!-- header -->
        <div id="main_header">
            <header>
                <div class="header-innr">


                    <!-- Logo-->
                    <div class="header-btn-traiger" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible">
                        <span></span></div>

                    <!-- Logo-->
                    <div id="logo">
                        <a href="{{ route('social.home')}}"> <img src="assets/images/logo.png" alt=""></a>
                        <a href="{{ route('social.home')}}"> <img src="assets/images/logo-light.png" class="logo-inverse"
                                alt=""></a>
                    </div>

                    <!-- form search-->
                    <div class="head_search">
                        <form>
                            <div class="head_search_cont">
                                <input value="" type="text" class="form-control"
                                    placeholder="Search for Friends , Videos and more.." autocomplete="off">
                                <i class="s_icon uil-search-alt"></i>
                            </div>

                            <!-- Search box dropdown -->
                            <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small"
                                class="dropdown-search">
                                <!-- User menu -->

                                <ul class="dropdown-search-list">
                                    <li class="list-title"> Recent Searches </li>
                                    <li> <a href="#"> <img src="assets/images/avatars/avatar-2.jpg" alt=""> Erica Jones
                                        </a> </li>
                                    <li> <a href="#"> <img src="assets/images/group/group-2.jpg" alt=""> Coffee
                                            Addicts</a> </li>
                                    <li> <a href="#"> <img src="assets/images/group/group-4.jpg" alt=""> Mountain Riders
                                        </a> </li>
                                    <li> <a href="#"> <img src="assets/images/group/group-5.jpg" alt=""> Property Rent
                                            And Sale </a> </li>
                                    <li class="menu-divider"></li>
                                    <li class="list-footer"> <a href="{{ route('social.home')}}"> Searches History </a>
                                    </li>
                                </ul>

                            </div>


                        </form>
                    </div>

                    <!-- user icons -->
                    <div class="head_user">


                        <a href="{{ route('social.home')}}" class="opts_icon_link uk-visible@s"> Home </a>
                        <a href="{{ route('social.home')}}" class="opts_icon_link uk-visible@s"> Dennis Han </a>


                        <!-- browse apps  -->
                        <a href="#" class="opts_icon uk-visible@s" uk-tooltip="title: Apps ; pos: bottom ;offset:7">
                            <img src="assets/images/icons/apps.svg" alt="">
                        </a>

                        <!-- browse apps dropdown -->
                        <div uk-dropdown="mode:click ; pos: bottom-center ; animation: uk-animation-scale-up"
                            class="icon-browse">
                            <a href="#" class="icon-menu-item"> <i class="uil-shop"></i> Marketplace </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-envelope-alt"></i> Messages </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-bookmark"></i> Bookmark </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-users-alt"></i> Groups </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-calendar-alt"></i> Events </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-file-alt"></i> Forum </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-question-circle"></i> Questions </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-bolt-alt"></i> Upgrade </a>
                            <a href="#" class="icon-menu-item"> <i class="uil-user-circle"></i> Account </a>
                            <a href="#" class="more-app"> More Apps</a>
                        </div>


                        <!-- Message  notificiation dropdown -->
                        <a href="#" class="opts_icon" uk-tooltip="title: Messages ; pos: bottom ;offset:7">
                            <img src="assets/images/icons/chat.svg" alt=""> <span>4</span>
                        </a>

                        <!-- Message  notificiation dropdown -->
                        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                            class="dropdown-notifications">

                            <!-- notification contents -->
                            <div class="dropdown-notifications-content" data-simplebar>

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Messages</h4>
                                    <a href="#">
                                        <i class="icon-feather-settings"
                                            uk-tooltip="title: Message settings ; pos: left"></i>
                                    </a>

                                    <input type="text" class="uk-input" placeholder="Search in Messages">
                                </div>

                                <!-- notiviation list -->
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Jonathan Madano</strong>
                                                <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span> </p>

                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Stella Johnson</strong>
                                                <p> Alex will explain you how ... <span class="time-ago"> 3 h </span>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Alex Dolgove</strong>
                                                <p> Alia just joined Messenger! <span class="time-ago"> 3 h </span> </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Adrian Mohani</strong>
                                                <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span> </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Jonathan Madano</strong>
                                                <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span> </p>

                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Stella Johnson</strong>
                                                <p> Alex will explain you how ... <span class="time-ago"> 3 h </span>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Alex Dolgove</strong>
                                                <p> Alia just joined Messenger! <span class="time-ago"> 3 h </span> </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                            </span>
                                            <div class="notification-text notification-msg-text">
                                                <strong>Adrian Mohani</strong>
                                                <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span> </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <div class="dropdown-notifications-footer">
                                <a href="#"> See all in Messages</a>
                            </div>


                        </div>


                        <!-- notificiation icon  -->
                        <a href="#" class="opts_icon" uk-tooltip="title: Notifications ; pos: bottom ;offset:7">
                            <img src="assets/images/icons/bell.svg" alt=""> <span>3</span>
                        </a>


                        <!-- notificiation dropdown -->
                        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                            class="dropdown-notifications">

                            <!-- notification contents -->
                            <div class="dropdown-notifications-content" data-simplebar>

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Notifications </h4>
                                    <a href="#">
                                        <i class="icon-feather-settings"
                                            uk-tooltip="title: Notifications settings ; pos: left"></i>
                                    </a>
                                </div>

                                <!-- notiviation list -->
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i></span>
                                            <span class="notification-text">
                                                <strong>Adrian Moh.</strong> Like Your Comment On Video
                                                <span class="text-primary">Learn Prototype Faster</span>
                                                <br> <span class="time-ago"> 9 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-danger">
                                                <i class="icon-feather-star"></i></span>
                                            <span class="notification-text">
                                                <strong>Alex Dolgove</strong> Added New Review In Video
                                                <span class="text-primary">Full Stack PHP Developer</span>
                                                <br> <span class="time-ago"> 19 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-success">
                                                <i class="icon-feather-message-circle"></i></span>
                                            <span class="notification-text">
                                                <strong>Stella John</strong> Replay Your Comment in
                                                <span class="text-primary">Adobe XD Tutorial</span>
                                                <br> <span class="time-ago"> 12 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i></span>
                                            <span class="notification-text">
                                                <strong>Adrian Moh.</strong> Like Your Comment On Video
                                                <span class="text-primary">Learn Prototype Faster</span>
                                                <br> <span class="time-ago"> 9 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-warning">
                                                <i class="icon-feather-star"></i></span>
                                            <span class="notification-text">
                                                <strong>Alex Dolgove</strong> Added New Review In Video
                                                <span class="text-primary">Full Stack PHP Developer</span>
                                                <br> <span class="time-ago"> 19 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="notification-avatar">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                            </span>
                                            <span class="notification-icon bg-gradient-success">
                                                <i class="icon-feather-message-circle"></i></span>
                                            <span class="notification-text">
                                                <strong>Stella John</strong> Replay Your Comment in
                                                <span class="text-primary">Adobe XD Tutorial</span>
                                                <br> <span class="time-ago"> 12 hours ago </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>

                            </div>


                        </div>


                        <!-- profile -image -->
                        <a class="opts_account" href="#"> <img src="assets/images/avatars/avatar-2.jpg" alt=""></a>

                        <!-- profile dropdown-->
                        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                            class="dropdown-notifications rounded-lg">

                            <!-- User Name / Avatar -->
                            <a href="#">

                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-avatar">
                                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="dropdown-user-name"> Dennis Han </div>
                                </div>

                            </a>

                            <!-- User menu -->

                            <ul class="dropdown-user-menu">
                                <li><a href="{{ route('social.home')}}"> <i class="uil-user"></i> My Account </a> </li>
                                <li><a href="{{ route('social.home')}}"> <i class="uil-thumbs-up"></i> Liked Pages </a></li>
                                <li><a href="{{ route('social.home')}}"> <i class="uil-cog"></i> Account Settings</a></li>
                                <li><a href="#" style="color:#1a73e8"> <i class="uil-bolt"></i> Upgrade To Premium</a>
                                </li>
                                <li>
                                    <a href="#" id="night-mode" class="btn-night-mode">
                                        <i class="uil-moon"></i> Night mode
                                        <span class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </span>
                                    </a>
                                </li>
                                </li>
                                <li><a href="{{ route('social.home')}}"> <i class="uil-sign-out-alt"></i>Sign Out</a>
                                </li>
                            </ul>


                        </div>


                    </div>

                </div> <!-- / heaader-innr -->
            </header>

        </div>


        <div class="story-pop uk-animation-slide-bottom-small">
            <div class="story-side uk-width-1-4@s">

                <!--
                <div class="story-side-search">
                    <input type="text" class="uk-input" placeholder="Search user....">
                    <i class="submit uil-search-alt"></i>
                </div> -->

                <div class="uk-flex uk-flex-between uk-flex-middle mb-2">
                    <h2 class="mb-0" style="font-weight: 700">All Story</h2>
                    <a href="#" class="text-primary"> Setting</a>
                </div>

                <div class="story-side-innr" data-simplebar>
                    <h4 class="mb-1"> Your Story</h4>
                    <ul class="story-side-list">
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5> Stella Johnson </h5>
                                    <p>  Share a photo or video</p>
                                </div>
                                <div class="add-story-btn">
                                    <i class="uil-plus"></i>
                                </div>
                            </a>

                        </li>
                    </ul>

                    <div class="uk-flex uk-flex-between uk-flex-middle my-3">
                        <h4 class="m-0"> Friends Story</h4>
                        <a href="#" class="text-primary"> See all</a>
                    </div>
                    <ul class="story-side-list"
                        uk-switcher="connect: #story-slider-switcher ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">

                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5>  Dennis Han   </h5>
                                    <p> <span class="story-count"> 2 new </span> <span class="story-time-ago"> 4hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5> Stella Johnson </h5>
                                    <p> <span class="story-count"> 3 new </span> <span class="story-time-ago"> 1hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5>  Erica Jones  </h5>
                                    <p> <span class="story-count"> 2 new </span> <span class="story-time-ago"> 3hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-7.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5> Adrian Mohani </h5>
                                    <p> <span class="story-count"> 1 new </span> <span class="story-time-ago"> 4hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5>   Alex Dolgove   </h5>
                                    <p> <span class="story-count"> 3 new </span> <span class="story-time-ago"> 7hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5> Stella Johnson </h5>
                                    <p> <span class="story-count"> 2 new </span> <span class="story-time-ago"> 8hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5>  Erica Jones </h5>
                                    <p> <span class="story-count"> 3 new </span> <span class="story-time-ago"> 10hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <div class="story-user-media">
                                    <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                </div>
                                <div class="story-user-innr">
                                    <h5>  Alex Dolgove  </h5>
                                    <p> <span class="story-count"> 3 new </span> <span class="story-time-ago"> 14hr ago
                                        </span></p>
                                </div>
                            </a>

                        </li>

                    </ul>

                </div>

            </div>
            <div class="story-content">

                <!-- close button-->
                <span class="story-btn-close" uk-toggle="target: body ; cls: is-open"
                    uk-tooltip="title:Close story ; pos: left "></span>

                <div class="story-content-innr">

                    <ul id="story-slider-switcher" class="uk-switcher">

                        <li>

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>

                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/post/img-1.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-1.jpg" alt="">
                                        </div>
                                    </li>
                                </ul>


                            </div>


                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>

                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div class="story-slider-image">
                                            <img src="assets/images/post/img-3.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="story-slider-image">
                                            <img src="assets/images/avatars/avatar-lg-3.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="story-slider-image">
                                            <img src="assets/images/avatars/avatar-lg-2.jpg" alt="">
                                        </div>
                                    </li>
                                </ul>

                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li>

                            <!-- slider navigation -->

                            <a href="#" uk-switcher-item="previous"
                                class="uk-position-center-left-out uk-position-medium slidenav-prev"></a>
                            <a href="#" uk-switcher-item="next"
                                class="uk-position-center-right-out uk-position-medium slidenav-next"></a>

                            <div class="uk-position-relative uk-visible-toggle" uk-slider>
                                <!-- navigation -->
                                <ul class="uk-slider-nav uk-dotnav story-slider-nav"></ul>

                                <!-- Story posted image -->
                                <ul class="uk-slider-items uk-child-width-1-1 story-slider">
                                    <li>
                                        <div
                                            class="story-slider-image uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </li>

                    </ul>







                </div>




            </div>
        </div>

        <!-- contents -->
        <div class="main_content">

            <div class="main_content_inner">

                <div class="uk-grid-large" uk-grid>

                    <div class="uk-width-2-3@m fead-area">

                        <div class="section-small pt-0">
                            <div class="uk-position-relative" uk-slider="finite: true">

                                <div class="uk-slider-container pb-3">

                                    <ul
                                        class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-3 story-slider uk-grid">
                                        <li>
                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/avatars/avatar-lg-1.jpg"
                                                    uk-img>
                                                    <i class="uil-plus"></i>
                                                    <div class="story-card-content">
                                                        <h4> Dennis </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/events/listing-5.jpg"
                                                    uk-img>
                                                    <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                                    <div class="story-card-content">
                                                        <h4> Jonathan </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/avatars/avatar-lg-3.jpg"
                                                    uk-img>
                                                    <img src="assets/images/avatars/avatar-6.jpg" alt="">
                                                    <div class="story-card-content">
                                                        <h4> Stella </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li>

                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/avatars/avatar-lg-4.jpg"
                                                    uk-img>
                                                    <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                                    <div class="story-card-content">
                                                        <h4> Alex </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li>

                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/avatars/avatar-lg-2.jpg"
                                                    uk-img>
                                                    <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                                    <div class="story-card-content">
                                                        <h4> Adrian </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li>

                                            <a href="#" uk-toggle="target: body ; cls: is-open">
                                                <div class="story-card" data-src="assets/images/avatars/avatar-lg-5.jpg"
                                                    uk-img>
                                                    <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                                    <div class="story-card-content">
                                                        <h4> Dennis </h4>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>

                                    </ul>

                                    <div class="uk-visible@m">
                                        <a class="uk-position-center-left-out slidenav-prev" href="#"
                                            uk-slider-item="previous"></a>
                                        <a class="uk-position-center-right-out slidenav-next" href="#"
                                            uk-slider-item="next"></a>
                                    </div>
                                    <div class="uk-hidden@m">
                                        <a class="uk-position-center-left slidenav-prev" href="#"
                                            uk-slider-item="previous"></a>
                                        <a class="uk-position-center-right slidenav-next" href="#"
                                            uk-slider-item="next"></a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="post-newer">

                            <div class="post-new" uk-toggle="target: body ; cls: post-focus">
                                <div class="post-new-media">
                                    <div class="post-new-media-user">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-new-media-input">
                                        <input type="text" class="uk-input" placeholder="What's Your Mind ? Hamse!">
                                    </div>
                                </div>
                                <hr>
                                <div class="post-new-type">

                                    <a href="#">
                                        <img src="assets/images/icons/photo.png" alt="">
                                        Photo/Video
                                    </a>

                                    <a href="#" class="uk-visible@s">
                                        <img src="assets/images/icons/tag-friend.png" alt="">
                                        Tag Friend
                                    </a>

                                    <a href="#"><img src="assets/images/icons/reactions_wow.png" alt="">
                                        Fealing /Activity
                                    </a>

                                </div>
                            </div>

                            <div class="post-pop">

                                <div class="post-new-overyly" uk-toggle="target: body ; cls: post-focus"></div>

                                <div class="post-new uk-animation-slide-top-small">


                                    <div class="post-new-header">

                                        <h4> Create new post</h4>

                                        <!-- close button-->
                                        <span class="post-new-btn-close" uk-toggle="target: body ; cls: post-focus"
                                            uk-tooltip="title:Close; pos: left "></span>

                                    </div>

                                    <div class="post-new-media">
                                        <div class="post-new-media-user">
                                            <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                        </div>
                                        <div class="post-new-media-input">
                                            <input type="text" class="uk-input"
                                                placeholder="What's Your Mind ? Dennis!">
                                        </div>
                                    </div>
                                    <div class="post-new-tab-nav">
                                        <a href="#" uk-tooltip="title:Close"> <i class="uil-image"></i> </a>
                                        <a href="#"> <i class="uil-user-plus"></i> </a>
                                        <a href="#"> <i class="uil-video"></i> </a>
                                        <a href="#"> <i class="uil-record-audio"></i> </a>
                                        <a href="#"> <i class="uil-file-alt"></i> </a>
                                        <a href="#"> <i class="uil-emoji"></i> </a>
                                        <a href="#"> <i class="uil-gift"></i> </a>
                                        <a href="#"> <i class="uil-shopping-basket"></i> </a>
                                        <a href="#"> <i class="uil-check"></i> </a>
                                        <a href="#"> <i class="uil-graph-bar"></i> </a>
                                    </div>
                                    <div class="uk-flex uk-flex-between">


                                        <button class="button outline-light circle" type="button" style="
                                        border-color: #e6e6e6;  border-width: 1px;  ">Hover</button>
                                        <div uk-dropdown>
                                            <ul class="uk-nav uk-dropdown-nav">
                                                <li class="uk-active"><a href="#">Only me</a></li>
                                                <li><a href="#">Every one</a></li>
                                                <li><a href="#"> People I Follow </a></li>
                                                <li><a href="#">I People Follow Me</a></li>
                                            </ul>
                                        </div>

                                        <a href="#" class="button primary px-6"> Share </a>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="post">
                            <div class="post-heading">
                                <div class="post-avature">
                                    <img src="assets/images/avatars/avatar-6.jpg" alt="">
                                </div>
                                <div class="post-title">
                                    <h4> Mariah Ali </h4>
                                    <p> 5 <span> hrs</span> <i class="uil-users-alt"></i> </p>
                                </div>
                                <div class="post-btn-action">
                                    <span class="icon-more uil-ellipsis-h"></span>
                                    <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li>
                                            <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                    Delete </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">
                                <div class="fullsizeimg">
                                    <img src="assets/images/post/img-1.jpg" alt="">
                                </div>

                                <div class="post-state-details">
                                    <div>
                                        <img src="assets/images/icons/reactions_like.png" alt="">
                                        <img src="assets/images/icons/reactions_love.png" alt="">
                                        <p> 13 </p>
                                    </div>
                                    <p> 24 Comments</p>
                                </div>

                            </div>

                            <div class="post-state">
                                <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-bookmark"></i> 13 <span> Saved </span>
                                </div>
                            </div>

                            <!-- post comments -->
                            <div class="post-comments">
                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Alex Dolgove</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore magna aliquam erat </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 1d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6>Stella Johnson</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore <strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                            </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 2d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Jonathan Madano </h6>
                                            <p> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat
                                                volutpat.<strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>


                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>

                                <div class="post-add-comment">
                                    <div class="post-add-comment-avature">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-add-comment-text-area">
                                        <input type="text" placeholder="Write your comment...">
                                        <div class="icons">
                                            <span class="uil-link-alt"></span>
                                            <span class="uil-grin"></span>
                                            <span class="uil-image"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>

                        <div class="post">
                            <div class="post-heading">
                                <div class="post-avature">
                                    <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                </div>
                                <div class="post-title">
                                    <h4> Erica Jones </h4>
                                    <p> 5 <span> hrs</span> <i class="uil-users-alt"></i> </p>
                                </div>
                                <div class="post-btn-action">
                                    <span class="icon-more uil-ellipsis-h"></span>
                                    <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li>
                                            <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                    Delete </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">
                                <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-1-1@m">
                                        <img src="assets/images/post/img-4.jpg" class="rounded" alt="">
                                    </div>
                                    <div class="uk-width-1-2@m uk-width-1-2">
                                        <img src="assets/images/post/img-2.jpg" class="rounded" alt="">
                                    </div>
                                    <div class="uk-width-1-2@m uk-width-1-2 uk-position-relative">
                                        <img src="assets/images/post/img-3.jpg" class="rounded" alt="">
                                        <div class="uk-position-center uk-light">
                                            <a href="#">
                                                <h3> + 15 more </h3>
                                            </a></div>
                                    </div>
                                </div>

                                <div class="post-state-details">
                                    <div>
                                        <img src="assets/images/icons/reactions_like.png" alt="">
                                        <img src="assets/images/icons/reactions_love.png" alt="">
                                        <p> 13 </p>
                                    </div>
                                    <p> <span class="mr-2"> <i class="uil-eye"></i> Veiws </span> 212 Comments </p>
                                </div>

                            </div>

                            <div class="post-state">
                                <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-bookmark"></i> 13 <span> Saved </span>
                                </div>
                            </div>


                            <!-- post comments -->
                            <div class="post-comments">
                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Alex Dolgove</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore magna aliquam erat </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6>Stella Johnson</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore <strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                            </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Jonathan Madano </h6>
                                            <p> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat
                                                volutpat.<strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>


                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>

                                <div class="post-add-comment">
                                    <div class="post-add-comment-avature">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-add-comment-text-area">
                                        <input type="text" placeholder="Write your comment...">
                                        <div class="icons">
                                            <span class="uil-link-alt"></span>
                                            <span class="uil-grin"></span>
                                            <span class="uil-image"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>


                        <div class="post">
                            <div class="post-heading">
                                <div class="post-avature">
                                    <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                </div>
                                <div class="post-title">
                                    <h4> Stella Johnson </h4>
                                    <p> 5 <span> hrs</span> <i class="uil-users-alt"></i> </p>
                                </div>
                                <div class="post-btn-action">
                                    <span class="icon-more uil-ellipsis-h"></span>
                                    <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li>
                                            <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                    Delete </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">

                                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim laoreet dolore magna aliquam erat volutpat</p>
                                <div class="post-state-details">
                                    <div>
                                        <img src="assets/images/icons/reactions_like.png" alt="">
                                        <img src="assets/images/icons/reactions_love.png" alt="">
                                        <p> 13 </p>
                                    </div>
                                    <p> 24 Comments</p>
                                </div>

                            </div>

                            <div class="post-state">
                                <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-bookmark"></i> 13 <span> Saved </span>
                                </div>
                            </div>

                            <!-- post comments -->
                            <div class="post-comments">
                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Alex Dolgove</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore magna aliquam erat </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 1d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6>Stella Johnson</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore <strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                            </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 2d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>

                                <div class="post-add-comment">
                                    <div class="post-add-comment-avature">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-add-comment-text-area">
                                        <input type="text" placeholder="Write your comment...">
                                        <div class="icons">
                                            <span class="uil-link-alt"></span>
                                            <span class="uil-grin"></span>
                                            <span class="uil-image"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="post">
                            <div class="post-heading">
                                <div class="post-avature">
                                    <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                </div>
                                <div class="post-title">
                                    <h4> Dennis Han </h4>
                                    <p> 5 <span> hrs</span> <i class="uil-users-alt"></i> </p>
                                </div>
                                <div class="post-btn-action">
                                    <span class="icon-more uil-ellipsis-h"></span>
                                    <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li>
                                            <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                    Delete </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">

                                <div class="fullsizevid">
                                    <div class="embed-video">
                                        <iframe src="https://www.youtube.com/embed/pQN-pnXPaV g " frameborder="0"
                                            uk-video="automute: true" allowfullscreen uk-responsive></iframe>
                                    </div>
                                </div>

                                <div class="post-state-details">
                                    <div>
                                        <img src="assets/images/icons/reactions_like.png" alt="">
                                        <img src="assets/images/icons/reactions_love.png" alt="">
                                        <p> 13 </p>
                                    </div>
                                    <p> <span class="mr-2"> <i class="uil-eye"></i> 38 Veiws </span> 212 Comments </p>
                                </div>

                            </div>

                            <div class="post-state">
                                <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-bookmark"></i> 13 <span> Saved </span>
                                </div>
                            </div>


                            <!-- post comments -->
                            <div class="post-comments">
                                <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6> Alex Dolgove</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore magna aliquam erat </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>
                                <div class="post-comments-single">
                                    <div class="post-comment-avatar">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-comment-text">
                                        <div class="post-comment-text-inner">
                                            <h6>Stella Johnson</h6>
                                            <p> Ut wisi enim ad minim laoreet dolore <strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                            </a>
                                            <a href="#" class=" mr-1"> Replay </a>
                                            <span> 3d</span>
                                        </div>
                                    </div>
                                    <a href="#" class="post-comment-opt"></a>
                                </div>

                                <div class="post-add-comment">
                                    <div class="post-add-comment-avature">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="post-add-comment-text-area">
                                        <input type="text" placeholder="Write your comment...">
                                        <div class="icons">
                                            <span class="uil-link-alt"></span>
                                            <span class="uil-grin"></span>
                                            <span class="uil-image"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>


                    </div>


                    <!-- sidebar -->
                    <div class="uk-width-expand">


                        <h3 class="mb-2"> Birthdays</h3>

                        <a href="#" class="uk-link-reset">
                            <div class="uk-flex uk-flex-top py-2 pb-0 pl-2 mb-2 bg-secondary-hover rounded">
                                <img src="assets/images/icons/gift-icon.png" width="35px" class="mr-3" alt="">
                                <p> <strong> Jessica Erica </strong> and <strong> two others </strong>
                                    have a birthdays to day .</p>
                            </div>
                        </a>


                        <div class="p-5 mb-3 rounded uk-background-cover uk-light"
                            style="background-blend-mode: color-burn; background-color:rgba(0, 126, 255, 0.06)"
                            data-src="assets/images/events/img-2.jpg" uk-img>
                            <div class="uk-width-4-5">
                                <h3 class="mb-2">
                                    <i class="uil-users-alt p-1 text-dark bg-white circle icon-small"></i>
                                    Groups </h3>
                                <p> New ways to find and join communications .</p>
                                <a href="#" class="button white small"> Find your groups</a>
                            </div>
                        </div>

                        <h3 class="mb-1"> Contacts </h3>

                        <div uk-sticky="offset:70 ; media : @m">

                            <ul class="uk-child-width-expand tab-small my-2 uk-tab">
                                <li class="uk-active"><a href="#">Friends</a></li>
                                <li><a href="#">Groups</a></li>
                            </ul>

                            <!-- contact list             you can use data-simplebar scroll   data-simplebar in div -->
                            <div style="height: calc(100vh - 150px)">

                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-2.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Dennis Han</h5>
                                    </div>
                                </a>
                                <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                                    <div class="contact-list-box">
                                        <div class="contact-list-box-media">
                                            <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                            <span class="online-dot"></span>
                                        </div>
                                        <h4> Dennis Han</h4>
                                        <p> <i class="uil-users-alt icon-small"></i> Become friends with <strong> Stella
                                                Johnson </strong> and <strong> 14 Others</strong>
                                        </p>
                                        <div class="contact-list-box-btns">
                                            <a href="#" class="button primary block mr-2">
                                                <i class="uil-envelope mr-1"></i> Send message</a>
                                            <a href="#" class="button secondary button-icon mr-2">
                                                <i class="uil-list-ul"> </i> </a>
                                            <a href="#" class="button secondary button-icon"> <i class="uil-ellipsis-h">
                                                </i> </a>
                                        </div>
                                    </div>
                                </div>

                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-1.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Erica Jones </h5>
                                    </div>
                                </a>
                                <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                                    <div class="contact-list-box">
                                        <div class="contact-list-box-media">
                                            <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                            <span class="online-dot"></span>
                                        </div>
                                        <h4> Erica Jones </h4>
                                        <p> <i class="uil-users-alt icon-small"></i> Become friends with <strong> Stella
                                                Johnson </strong> and
                                            <strong> 14 Others</strong>
                                        </p>
                                        <div class="contact-list-box-btns">
                                            <a href="#" class="button primary block mr-2"> <i
                                                    class="uil-envelope mr-1"></i>
                                                Send message</a>
                                            <a href="#" class="button secondary button-icon mr-2"> <i
                                                    class="uil-list-ul">
                                                </i> </a>
                                            <a href="#" class="button secondary button-icon"> <i class="uil-ellipsis-h">
                                                </i> </a>
                                        </div>
                                    </div>
                                </div>

                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-7.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Stella Johnson </h5>
                                    </div>
                                </a>

                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-5.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Alex Dolgove </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-2.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Dennis Han</h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-4.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Erica Jones </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-3.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Stella Johnson </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-5.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Alex Dolgove </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-2.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Dennis Han</h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-4.jpg"
                                                alt="">
                                            <span class="online-dot"></span> </div>
                                        <h5> Erica Jones </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-3.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Stella Johnson </h5>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="contact-list">
                                        <div class="contact-list-media"> <img src="assets/images/avatars/avatar-5.jpg"
                                                alt="">
                                            <span class="offline-dot"></span> </div>
                                        <h5> Alex Dolgove </h5>
                                    </div>
                                </a>


                            </div>
                        </div>



                    </div>

                </div>

            </div>
        </div>


    </div>


    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);


        (function (window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('night-mode');
                if (document.documentElement.classList.contains('night-mode')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>


    <!-- javaScripts
                ================================================== -->
    <script src="assets/js/framework.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/simplebar.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
