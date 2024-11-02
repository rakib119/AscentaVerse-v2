@php
    $social_media_user_data = session()->get('social_media_user_data');
    if (!$social_media_user_data)
    {
        store_social_media_info();
        $social_media_user_data = session()->get('social_media_user_data');
    }
    extract($social_media_user_data);
@endphp
@extends('socialMedia.commonFile.socialLayouts1')
@section('topBar')
    @include('socialMedia.commonFile.topBar')
@endsection

@section('leftBar')
    @include('socialMedia.commonFile.leftBarV1')
@endsection
@section('mainContent')
    <div class="main_content">
        <div class="main_content_inner pt-0">

            <div class="profile">
                <div class="profile-cover">

                    <!-- profile cover -->
                    <img id="user_cover_photo_view" src="{{ asset('social-media/assets/images/uploaded_img/'.$thumbnail_cover)}}" alt="">

                    <a href="#" onclick="event.preventDefault();document.getElementById('userCoverPhoto').click();"> <i class="uil-camera"></i> Edit </a>

                    <input id="userCoverPhoto" style="display: none;" type="file" accept="jpg,png"  onchange="cropImage(this,2,250,1000,'user_cover_photo_view')">

                </div>

                <div class="profile-details">
                    <div class="profile-image">
                        <img id="profile_photo_view" src="{{ asset('social-media/assets/images/uploaded_img/'.$thumbnail_profile)}}" alt="">
                        <a href="#" onclick="event.preventDefault();document.getElementById('profilePhoto').click();"> </a>

                        <input id="profilePhoto" style="display: none;" type="file" accept="jpg,png"  onchange="cropImage(this,1,260,260,'profile_photo_view')">

                    </div>
                    <div class="profile-details-info">
                        <h1> {{auth()->user()->name}} </h1>
                        {{-- <p> Family , Food , Fashion , Fourever <a href="#">Edit </a></p> --}}
                    </div>

                </div>


                <div class="nav-profile" uk-sticky="offset:61;media : @s">
                    <div class="py-md-2 uk-flex-last">
                        <a href="#" class="button primary mr-2"> <i class="uil-plus"></i> Add your story</a>
                        <a href="#" class="button secondary button-icon mr-2"> <i class="uil-list-ul"> </i> </a>
                        <a href="#" class="button secondary button-icon"> <i class="uil-ellipsis-h"> </i> </a>
                        <div uk-dropdown="pos: bottom-left ; mode:hover ">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li><a href="#"> View as guast </a></li>
                                <li><a href="#"> Bloc this person </a></li>
                                <li><a href="#"> Report abuse</a></li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <nav class="responsive-tab">
                            <ul>
                                <li class="uk-active"><a class="active" href="#">Timeline</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Friend</a></li>
                                <li><a href="#">Photoes</a></li>
                                <li><a href="#">Videos</a></li>
                            </ul>
                        </nav>
                        <div class="uk-visible@s">
                            <a href="#" class="nav-btn-more"> More</a>
                            <div uk-dropdown="pos: bottom-left ; mode:click ">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#">Moves</a></li>
                                    <li><a href="#">Likes</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Groups</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="section-small">

                <div uk-grid>

                    <div class="uk-width-2-3@m fead-area">

                        <div class="post-new">
                            <div class="post-new-media">
                                <div class="post-new-media-user">
                                    <img src="{{ asset('social-media/assets/images/uploaded_img/'.$thumbnail_profile)}}" alt="">
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" placeholder="What's Your Mind ? {{auth()->user()->name}}!">
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
                                    <div class="mt-0 p-2" uk-dropdown="pos: top-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a>
                                            </li>
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
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared
                                    </span>
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
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i>
                                                Like
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
                                            <p> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                                aliquam
                                                erat
                                                volutpat.<strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                    <div class="mt-0 p-2" uk-dropdown="pos: top-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a>
                                            </li>
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
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared
                                    </span>
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
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i>
                                                Like
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
                                            <p> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                                aliquam
                                                erat
                                                volutpat.<strong> David !</strong> </p>
                                        </div>
                                        <div class="uk-text-small">
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                    <div class="mt-0 p-2" uk-dropdown="pos: top-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a>
                                            </li>
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
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared
                                    </span>
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
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i>
                                                Like
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
                                    <img src="{{ asset('social-media/assets/images/uploaded_img/'.$thumbnail_profile)}}" alt="">
                                </div>
                                <div class="post-title">
                                    <h4> {{auth()->user()->name}} Han </h4>
                                    <p> 5 <span> hrs</span> <i class="uil-users-alt"></i> </p>
                                </div>
                                <div class="post-btn-action">
                                    <span class="icon-more uil-ellipsis-h"></span>
                                    <div class="mt-0 p-2" uk-dropdown="pos: top-right;mode:hover ">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                            <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                            <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                                </a></li>
                                            <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a>
                                            </li>
                                            <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                    Delete </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">

                                <div class="fullsizevid">
                                    <div class="embed-video">
                                        <iframe src="https://www.youtube.com/embed/pQN-pnXPaVg" frameborder="0"
                                            uk-video="automute: true" allowfullscreen uk-responsive></iframe>
                                    </div>
                                </div>

                                <div class="post-state-details">
                                    <div>
                                        <img src="assets/images/icons/reactions_like.png" alt="">
                                        <img src="assets/images/icons/reactions_love.png" alt="">
                                        <p> 13 </p>
                                    </div>
                                    <p> <span class="mr-2"> <i class="uil-eye"></i> 38 Veiws </span> 212 Comments
                                    </p>
                                </div>

                            </div>

                            <div class="post-state">
                                <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span>
                                </div>
                                <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared
                                    </span>
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
                                            <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love
                                            </a>
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
                                            <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i>
                                                Like
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
                    <div class="uk-width-expand ml-lg-2">


                        <h3> About </h3>
                        <div class="list-group-items">
                            <i class="uil-home-alt"></i>
                            <h5> Live in <span> Cairo , Eygept </span> </h5>
                        </div>

                        <div class="list-group-items">
                            <i class="uil-location-point"></i>
                            <h5> From <span> Aden , Yemen </span> </h5>
                        </div>

                        <div class="list-group-items">
                            <i class="uil-heart"></i>
                            <h5> in a <span> Relationship </span> </h5>
                        </div>


                        <div class="list-group-items">
                            <i class="uil-rss"></i>
                            <h5> Flowwed by <span> 3,240 </span> <span> Peaple </span> </h5>
                        </div>

                        <a href="#" class="button soft-primary block my-3"> edit </a>

                        <hr class="mt-3 mb-0">

                        <div class="section-header">
                            <div class="section-header-left">
                                <h2 class="mb-0"> Friends </h2>
                                <p> 3,4510 friends</p>
                            </div>
                            <div class="section-header-right">
                                <a href="#" class="see-all text-primary"> See all</a>
                            </div>
                        </div>

                        <div class="uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4> Jonathan Madano </h4>
                                    </div>
                                </a>

                            </div>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4>Alex Dolgove</h4>
                                    </div>
                                </a>

                            </div>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4> Stella Johnson </h4>
                                    </div>
                                </a>

                            </div>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4> Mohamed Khalif </h4>
                                    </div>
                                </a>

                            </div>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4> Adrian Mohani </h4>
                                    </div>
                                </a>

                            </div>
                            <div>

                                <a href="#" class="profile-friend-card">
                                    <div class="profile-friend-card-thumbnail">
                                        <img src="assets/images/avatars/avatar-6.jpg" alt="">
                                    </div>
                                    <div class="profile-friend-card-content">
                                        <h4>Alex Dolgove</h4>
                                    </div>
                                </a>

                            </div>
                        </div>

                        <a href="#" class="button secondary block my-3"> See All </a>

                        <hr class="mt-3 mb-0">

                        <div class="section-header">
                            <div class="section-header-left">
                                <h2> Photos </h2>
                            </div>
                            <div class="section-header-right">
                                <a href="#" class="see-all text-primary"> See all</a>
                            </div>
                        </div>

                        <div class="uk-child-width-1-3 uk-grid-collapse uk-overflow-hidden"
                            style="border-radius: 16px;" uk-grid>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/post/img-1.jpg" uk-img>
                                    </div>
                                </a>
                            </div>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/post/img-2.jpg" uk-img>
                                    </div>
                                </a>
                            </div>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/post/img-3.jpg" uk-img>
                                    </div>
                                </a>
                            </div>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/post/img-4.jpg" uk-img>
                                    </div>
                                </a>
                            </div>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/category/img6.jpg" uk-img>
                                    </div>
                                </a>
                            </div>
                            <div> <a href="#">
                                    <div class="photo-card small" data-src="assets/images/category/img3.jpg" uk-img>
                                    </div>
                                </a>
                            </div>

                        </div>

                        <hr class="mt-3 mb-2">

                        <div uk-sticky="offset:144 ; bottom:true ; meda : @m">


                            <div class="section-header pt-2">
                                <div class="section-header-left">
                                    <h2> Group Likes </h2>
                                </div>
                                <div class="section-header-right">
                                    <a href="#" class="see-all text-primary"> See all</a>
                                </div>
                            </div>

                            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>
                                <!-- list itme 1 -->
                                <div>
                                    <div class="list-items">
                                        <div class="list-item-media">
                                            <img src="assets/images/group/group-2.jpg" alt="">
                                        </div>
                                        <div class="list-item-content">
                                            <a href="group-feed.html">
                                                <h5> Coffee Addicts </h5>
                                            </a>
                                            <p> Drinks , Food </p>
                                        </div>
                                        <div class="uk-width-auto">
                                            <span class="btn-option">
                                                <i class="icon-feather-more-horizontal"></i>
                                            </span>
                                            <div class="dropdown-option-nav"
                                                uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                                <ul>
                                                    <li>
                                                        <span> <i class="uil-bell"></i> Joined </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-bookmark"></i> Add Bookmark </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-share-alt"></i> Share Your Friends
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- list itme 2 -->
                                <div>
                                    <div class="list-items">
                                        <div class="list-item-media">
                                            <img src="assets/images/group/group-1.jpg" alt="">
                                        </div>
                                        <div class="list-item-content">
                                            <a href="group-feed.html">
                                                <h5> Architecture </h5>
                                            </a>
                                            <p> Engineering, artchects </p>
                                        </div>
                                        <div class="uk-width-auto">
                                            <span class="btn-option">
                                                <i class="icon-feather-more-horizontal"></i>
                                            </span>
                                            <div class="dropdown-option-nav"
                                                uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                                <ul>
                                                    <li>
                                                        <span> <i class="uil-bell"></i> Joined </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-bookmark"></i> Add Bookmark </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-share-alt"></i> Share Your Friends
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- list itme 3 -->
                                <div>
                                    <div class="list-items">
                                        <div class="list-item-media">
                                            <img src="assets/images/group/group-3.jpg" alt="">
                                        </div>
                                        <div class="list-item-content">
                                            <a href="group-feed.html">
                                                <h5> Graphic Design </h5>
                                            </a>
                                            <p> Design </p>
                                        </div>
                                        <div class="uk-width-auto">
                                            <span class="btn-option">
                                                <i class="icon-feather-more-horizontal"></i>
                                            </span>
                                            <div class="dropdown-option-nav"
                                                uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                                <ul>
                                                    <li>
                                                        <span> <i class="uil-bell"></i> Joined </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-bookmark"></i> Add Bookmark </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-share-alt"></i> Share Your Friends
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- list itme 4 -->
                                <div>
                                    <div class="list-items">
                                        <div class="list-item-media">
                                            <img src="assets/images/group/group-4.jpg" alt="">
                                        </div>
                                        <div class="list-item-content">
                                            <a href="group-feed.html">
                                                <h5> Property Rent </h5>
                                            </a>
                                            <p> Listing , Homes </p>
                                        </div>
                                        <div class="uk-width-auto">
                                            <span class="btn-option">
                                                <i class="icon-feather-more-horizontal"></i>
                                            </span>
                                            <div class="dropdown-option-nav"
                                                uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                                <ul>
                                                    <li>
                                                        <span> <i class="uil-bell"></i> Joined </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-bookmark"></i> Add Bookmark </span>
                                                    </li>
                                                    <li>
                                                        <span> <i class="uil-share-alt"></i> Share Your Friends
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <a href="#" class="button secondary block my-3"> See All </a>

                        </div>







                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
