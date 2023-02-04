<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="frameworks/bootstrap 4/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link rel="stylesheet" href="style/dark.css" id="css_mode">
</head>
<body >
    <div class="row m-0" style="height: 100vh;width:100vw;overflow: hidden;">
        <!-- left side -->
        <div class="d-none d-md-block col-md-8 w-100 vh-100 px-0 border-right border-dark justify-content-center" id="left_section">
            <!-- left nav bar -->
            <div class="justify-content-between d-flex align-items-center border-right-0" id="friend_bar">
                <div class="ml-2 d-flex">
                    <i class="bi bi-person-circle h4 icons_nav" id="person">f</i>
                    <i class="bi bi-telephone-fill h4 mx-3 icons_nav"></i>
                    <i class="bi bi-camera-video-fill h4 icons_nav"></i>
                </div>
                <div class="d-flex align-items-center">
                    <div class="text-right"  style="line-height:16px;">
                        <b>younes talibi</b><br>
                        <small><b class="text-muted ">Online</b></small>
                    </div>
                    <div class="mx-2" style="width:40px;height:40px;position: relative;">
                        <img src="data:image/jpeg;base64,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" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                    </div>
                    <div >
                        <i style="cursor:pointer;" id="switch_to_list" class="bi px-1 font mr-2 rounded-circle bi-arrow-right h3 text-info d-md-none"></i>
                    </div>
                </div>
            </div>
            <!-- left nav bar -->
            <div class="row w-100 m-0" id="conversation">
                <!-- friend profile -->
                <div class="col-lg-6 p-0 d-none " id="friend_profile" >
                    <div class="lines mb-2 h-50 align-items-center d-flex justify-content-center flex-column">
                        <div class="mx-2 mb-2" style="width:150px;height:150px;position: relative;">
                            <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                        <div class="text-center">
                            <b class="h5">younes talibi</b>
                            <div >younessetalibi@gmail.com</div>
                        </div>
                    </div>
                    <div class="lines border-dark px-3 d-flex flex-column justify-content-center" style="height: 14%!important;">
                        <b class="h-25 text-muted">Status</b>
                        <div class="h-50 h6 mt-1">by the god</div>
                    </div>
                    <div class="lines h-25 px-3 d-flex flex-column justify-content-center" >
                        <div class="justify-content-between d-flex">
                            <b class="h-25 text-muted">Social</b>
                            <div class="text-muted" id="all_media" style="cursor:pointer;">
                                <b>28</b>
                                <i class="bi bi-caret-right-fill"></i>
                            </div>
                        </div>
                        <div class="flex-row d-flex justify-content-center" style="overflow:auto;">
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark d-flex justify-content-center align-items-center rounded">
                                <img src="/img/profile.webp" style="width:90%; height:90%" alt="">
                            </div>
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark d-flex justify-content-center align-items-center rounded">
                                <img src="/img/profile.webp" style="width:90%; height:90%" alt="">
                            </div>
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark d-flex justify-content-center align-items-center rounded">
                                <img src="/img/profile.webp" style="width:90%; height:90%" alt="">
                            </div>
                        </div>
                    </div>
                    <ul class="list-group border-0 text-danger font-weight-bold mb-5">
                        <li class="list-group-item border-0 options" id="block_user">Block User</li>
                        <li class="list-group-item border-0 options" id="delete_conversation">Delete conversation</li>
                    </ul>
                </div>
                <!-- friend profile -->
                <!-- media section -->
                <div class="col-lg-6 d-none p-0" id="media_section">
                    <div>
                        <div class="text-right">
                            <i class="bi bi-arrow-right h2 mx-3" style="cursor:pointer;" id="switch_to_leftmenu"></i>
                        </div>
                        <div class="lines text-center font-weight-bold h4">Social</div>
                    </div>
                    <div class="p-2">
                        <div class="row mb-4">
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                            <div class="col">
                                <img src="/img/profile.webp" class="w-100 h-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- media section -->
                <!-- conversation -->
                <div class="col h-100 pb-3"  style="font-size:14px;display: flex;flex-direction: column-reverse;overflow-y:auto;overflow-x: hidden;">
                    <div id="messages">
                        <!-- space at the top of conversation -->
                        <div style="height:170px !important" class="justify-content-center d-flex align-items-center">
                            <div class="bg-warning w-75 rounded h-auto p-3 d-flex align-items-center justify-content-center font-weight-bold h6 " style="background-color: #4e569fc2!important;border-top-left-radius: 30px !important;border-bottom-right-radius: 30px !important;font-family: cursive;">
                                We create the technology to connect the world
                            </div>
                        </div>
                        <!-- space at the top of conversation -->
                        <!-- recived message -->
                        <div class="row mx-0 py-1">
                            <div class="col-auto px-3 py-2" id="recived_message">
                                <div id="tringle_recived"></div>
                                <b>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum earum ullam mollitia, hic perferendis, consectetur iure officiis tenetur tempore labore voluptatum ex dolore, maiores accusamus. Eaque reiciendis facere hic praesentium.</b>
                                <div class="align-items-center d-flex">
                                    <i class="bi bi-check-all"></i>
                                    <small class="font-weight-bold" style="font-size: 11px;">12:42PM</small>
                                </div>
                            </div>
                        </div>
                        <!-- recived message -->
                        <!-- sent message -->
                        <div class="row justify-content-end mx-0 py-1">
                            <div class="col-auto px-3 py-2" id="sent_message">
                                <div id="tringle_sent"></div>
                                <b>hello how are you doing ?</b>
                                <div class="align-items-center d-flex">
                                    <i class="bi bi-check-all"></i>
                                    <small class="font-weight-bold" style="font-size: 11px;">12:42PM</small>
                                </div>
                            </div>
                        </div>
                        <!-- sent message -->
                    </div>                                                 
                </div>
                <!-- conversation -->
            </div>
            <!-- message input -->
            <div class="row d-flex align-items-center justify-content-center mx-0 w-100" id="message_input_container" >
                <div class="col-1 d-flex justify-content-end">
                    <i class="bi bi-emoji-smile h3 send_icon" id="emoji" ></i>
                </div>
                <div class="col-1 d-flex justify-content-center">
                    <i class="bi bi-share h3 send_icon" id="files"></i>
                    <input type="file" class="d-none" id="upload">
                </div>
                <div class="col-8 px-0 ">
                    <input type="text" id="message_input" class=" form-control font-weight-bold h-100" placeholder="write message">
                </div>
                
                <div class="col-1 justify-content-center d-flex ">
                    <i class="bi bi-send h3 send_icon" id="send_message"></i>
                </div>
            </div>
            <!-- message input -->
        </div>
        <!-- left side -->


        <!-- right side -->
        <div class=" col-md-4 d-md-block m-0 p-0 " id="right_section">
            <!-- user profile -->
            <div class="w-100 h-100 d-none" id="profile_settings">
                <div style="position: sticky;height: 100%;top: 0px">
                    <div class="align-items-end d-flex" id="user_profile_bar">
                        <div class="d-flex align-items-center"  id="back_menu" style="cursor: pointer;">
                            <i class="bi bi-backspace-fill mb-1 mx-2 h5"></i><span class="h3">Back</span>
                        </div>
                    </div>
                <div style="overflow-y: auto;height: calc(100vh - 90px);" class="pb-5">
                    <div class="lines mb-2 h-50 align-items-center d-flex justify-content-center flex-column">
                        <div class="mx-2 mb-2" style="width:200px;height:200px;position: relative;">
                            <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                    </div>
                    <div class="lines mt-2 ">
                        <div class="text-center font-weight-bold text-muted">
                            Username
                        </div>
                        <div class="d-flex justify-content-center mb-3 mt-2">
                            <input type="text" class="form-control w-75" value="younes talibi">
                        </div>
                    </div>
                    <div class="lines mt-2 ">
                        <div class="text-center font-weight-bold text-muted">
                            Status
                        </div>
                        <div class="d-flex justify-content-center mb-3 mt-2">
                            <input type="text" class="form-control w-75" value="by the god">
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- user profile -->
            <div>
                <!-- right nav bar -->
                <div class="justify-content-between d-flex align-items-center" id="user_navbar">
                    <div>
                        <i class="bi bi-gear-fill h4 text-primary ml-2" id="user_menu_icon" style="cursor:pointer;"></i>
                        <span><b class="h4">Chats</b></span>
                    </div>
                    <div class="mx-2" style="width:40px;height:40px;position: relative;">
                        <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                    </div>
                </div>
                <div id="right_menu" class="d-none">
                    <ul class="list-group">
                        <li class="list-group-item" id="apperances">Apperances</li>
                        <li class="list-group-item" id="profile">Profile</li>
                        <li class="list-group-item">Log out</li>
                      </ul>
                </div>
                <!-- right nav bar -->
                
                <!-- search for conv or friend -->
                <div>
                    <div style='position: relative;' class="p-2 mx-lg-4 mx-auto">
                        <i class="bi bi-search h4" style="position: absolute;left: 20px; top: 13px;"></i>
                        <input type="text" class="m-auto form-control pl-5 w-100" placeholder="Search for friend">
                        <ul class="list-group w-100 mt-2 px-2 d-none" style="position:absolute;z-index:1;left:0px">
                            <li class="list-group-item" >search for friend</li>
                            <li class="list-group-item" >search for friend</li>
                            <li class="list-group-item">search for friend</li>
                        </ul>
                    </div>
                </div>
                <!-- search for conv or friend -->
                <!-- online users -->
                <div class="p-2 d-flex w-100 justify-content-end " style=" overflow-x:auto;">
                    <div>
                        <div class="mx-2 online " style="width:50px;height:50px;position: relative;">
                            <img src="data:image/jpeg;base64,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" class="rounded-circle " style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                    </div>
                    <div>
                        <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                            <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                    </div>
                    <div>
                        <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                            <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                    </div>
                </div>
                <!-- online users -->
                <!-- list of people -->
                <div id='friends_list'>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle border-dark" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                                <img src="data:image/jpeg;base64,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" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    <div class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">12/12/2022</small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;">
                                <b>younes talibi</b>
                                <div>last message</div>
                            </div>
                            <div class="mx-2" style="width:50px;height:50px;position: relative;">
                                <img src="/img/profile.webp" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div> 
                    
                </div>
                <!-- list of people -->
            </div>
        </div>
        <!-- right side -->
    </div>











    <!-- warning before block person -->
    <div class="align-items-center justify-content-center d-none" id="block_warning" style="height: 100vh;width: 100vw;position: absolute;top: 0px;left: 0px;background-color: #0000007d;z-index:1;">
        <div class="p-5 rounded box_warning">
            <div class="text-center mt-3 h4">
                <b>Are you sure?</b>
            </div>
            <div class="d-flex justify-content-around mt-4 ">
                <div class="font-weight-bold  btn btn-success mx-2" id="cancel_block">cancle</div>
                <div class="text-white font-weight-bold btn btn-danger mx-2 ">Block</div>
            </div>
        </div> 
    </div>
    <!-- warning before block person -->

    <!-- warning before deleting conversation -->
    <div class="align-items-center justify-content-center d-none" id="delete_warning" style="height: 100vh;width: 100vw;position: absolute;top: 0px;left: 0px;background-color: #0000007d;z-index:1;">
        <div class="box_warning p-5 rounded">
            <div class="text-center mt-3 h4">
                <b>Are you sure?</b>
            </div>
            <div class="d-flex justify-content-around mt-4">
                <div class="font-weight-bold  btn btn-success mx-2" id="cancel_delete">cancle</div>
                <div class="text-white font-weight-bold btn btn-danger mx-2">Delete</div>
            </div>
        </div> 
    </div>
    <!-- warning before deleting conversation -->

    <!-- change appearance -->
    <div class="align-items-center justify-content-center d-none" id="change_mode" style="height: 100vh;width: 100vw;position: absolute;top: 0px;left: 0px;background-color: #0000007d;z-index:1;">
        <div class="box_warning p-5 rounded">
            <div class="text-left mt-3 h4">
                <b>Choose your mode!</b>
            </div>
            <div class="form-check ml-2">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode" checked>
                <label class="form-check-label" for="darkmode">Dark mode</label>
            </div>
            <div class="form-check ml-2">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" >
                <label class="form-check-label" for="lightmode">Light mode</label>
            </div>
            <div class="text-center mt-2">
                <div class="btn btn-secondary  mx-3" id="cancel_change_mode">cancel</div>
                <div class="btn btn-success px-3" id="save_mode">save</div>
            </div>
        </div> 
    </div>
    <!-- change appearance -->






    <script src="{{ URL::asset('frameworks/bootstrap 4/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frameworks/jQurey/Jquery.js') }}"></script>
    <script src="{{ URL::asset('js/index.js') }}"></script>
</body>

</html>