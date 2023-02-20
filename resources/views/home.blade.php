@extends('layouts.app')

@section('content')
<div>
    <div class="row m-0" style="height: 100vh;width:100vw;overflow: hidden;">
        <!-- left side -->
        <div class="d-none d-md-block col-md-8 w-100 vh-100 px-0 border-right border-dark justify-content-center" id="left_section">
            <!-- display welcome message -->
            <div id='welcome_message' class='bg-dark d-flex justify-content-center align-items-center' style='position: absolute;width: 100%;height: 101%;z-index: 1;'>
                <div class='w-75 text-center'>
                    <div>
                        <i class="bi bi-chat-square-quote-fill text-success" style='font-size: 150px;'></i>
                    </div>
                    <div class='text-white' style='font-family: cursive;'>
                        <div class='h3'>In our services you can now send and receive messages with your friends easily</div>
                    </div>
                </div>
            </div>
            <!-- display welcome message -->
            <!-- left nav-bar -->
            <div class="justify-content-between d-flex align-items-center border-right-0" id="friend_bar">
                <div class="ml-2 d-flex">
                    <i class="bi bi-person-circle h4 icons_nav" id="person"></i>
                    <!-- <i class="bi bi-telephone-fill h4 mx-3 icons_nav"></i>
                    <i class="bi bi-camera-video-fill h4 icons_nav"></i> -->
                </div>
                <div class="d-flex align-items-center">
                    <div class="text-right"  style="line-height:16px;">
                        <b class='user_name'>{{auth()->user()->name}}</b><br>
                        <small><b class="text-muted" id='user_status'>{{auth()->user()->status}}</b></small>
                    </div>
                    <div class="mx-2" style="width:40px;height:40px;position: relative;">
                        <img src="{{auth()->user()->profile->image_profile()}}" class="rounded-circle user_image" style="width:100%;height:100%;position: absolute;" alt="profile">
                    </div>
                    <div >
                        <i style="cursor:pointer;" id="switch_to_list" class="bi px-1 font mr-2 rounded-circle bi-arrow-right h3 text-info d-md-none"></i>
                    </div>
                </div>
            </div>
            <!-- left nav-bar -->
            <div class="row w-100 m-0" id="conversation">
                <!-- friend profile -->
                <div class="col-lg-6 p-0 d-none " id="friend_profile" >
                    <div class="lines mb-2 h-50 align-items-center d-flex justify-content-center flex-column" style="height: 215px !important;">
                        <div class="mx-2 mb-2" style="width:150px;height:150px;position: relative;">
                            <img src="{{auth()->user()->profile->image_profile()}}" class="rounded-circle user_image" style="width:100%;height:100%;position: absolute;" alt="profile">
                        </div>
                        <div class="text-center">
                            <b class="h5 user_name">{{auth()->user()->name}}</b>
                            <div id="user_email">{{auth()->user()->email}}</div>
                        </div>
                    </div>
                    <div class="lines border-dark px-3 d-flex flex-column justify-content-center" style="height: 14%!important;">
                        <b class="h-25 text-muted">Status</b>
                        <div class="h-50 h6 mt-1" id="user_description">{{auth()->user()->profile->description}}</div>
                    </div>
                    <div class="lines h-25 px-3 d-flex flex-column justify-content-center" >
                        <div class="justify-content-between d-flex">
                            <b class="h-25 text-muted">Social</b>
                            <div class="text-muted" id="all_media" style="cursor:pointer;">
                                <b id='count_images'>0</b>
                                <i class="bi bi-caret-right-fill"></i>
                            </div>
                        </div>
                        <div class="flex-row d-flex justify-content-center" style="overflow:auto;">
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark  d-flex justify-content-center align-items-center rounded">
                                <img src="img/message_images.jpg"  style="width:90%; height:90%" alt="" id='media-1'>
                            </div>
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark  d-flex justify-content-center align-items-center rounded">
                                <img src="img/message_images.jpg"  style="width:90%; height:90%" alt="" id='media-2'>
                            </div>
                            <div style="width:80px;height:80px;" class="mx-1 bg-dark  d-flex justify-content-center align-items-center rounded">
                                <img src="img/message_images.jpg"  style="width:90%; height:90%" alt="" id='media-3'>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group border-0 text-danger font-weight-bold mb-5">
                        <li class="list-group-item border-0 options" id="unfriend_user">Unfriend</li>
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
                        <div class="row mb-4" id='media'>
                            <!-- <div class="col-4">
                                <img src="{{auth()->user()->profile->image_profile()}}" class="w-100 h-100" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- media section -->
                <!-- conversation -->
                <div class="col h-100 pb-3"  style="font-size:14px;display: flex;flex-direction: column-reverse;overflow-y:auto;overflow-x: hidden;">
                    <div>
                        <div class="loader mx-auto d-none" id='loader'></div>
                        <!-- space at the top of conversation -->
                        <div style="height:170px !important" class="justify-content-center d-flex align-items-center">
                            <div class="bg-warning w-75 rounded h-auto p-3 d-flex align-items-center justify-content-center font-weight-bold h6 "  style="background-color: #4e569fc2!important;border-top-left-radius: 30px !important;border-bottom-right-radius: 30px !important;font-family: cursive;">
                                We create the technology to connect the world
                            </div>
                        </div>
                        <!-- space at the top of conversation -->
                        <!-- recived message -->
                        <div  id="messages" class='px-3'>
                            <div class="row mx-0 py-1 d-none">
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
                            <div class="row justify-content-end mx-0 py-1 d-none">
                                <div class="col-auto px-3 py-2" id="sent_message">
                                    <div id="tringle_sent"></div>
                                    <b>hello how are you doing ?</b>
                                    <div class="align-items-center d-flex">
                                        <i class="bi bi-check-all"></i>
                                        <small class="font-weight-bold" style="font-size: 11px;">12:42PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sent message -->
                    </div>                                                 
                </div>
                <!-- conversation -->
            </div>
            <!-- add friend -->
            <div class="row justify-content-center align-items-center d-none" id='addFriend' style="height: 50px !important;background-color: rgba(0, 106, 255, 0.263);position: absolute;bottom: 75px;width: 100%;left: 15px;">
                <div class="btn btn-secondary font-weight-bold w-auto " id='add_friend'>
                    <i class="bi bi-person-check h4 mr-2"></i>
                    <span>Add friend</span>
                </div>
            </div>
            <!-- add friend -->
            <!-- message input -->
        <div style='position: absolute;bottom: 50px;' class='w-auto bg-dark d-none ' id='preview_container'>
            <button id='remove_image' class='align-self-start d-flex flex-row btn btn-outline-danger w-100 justify-content-center'>&times;</button>
            <img src="" id='imgPreview' alt="upload image" style='max-height: 300px;'>
        </div>
        <form id='form' >
            <input type="hidden" name="to" value='none' id='to' id="">

            <div class="row d-flex align-items-center justify-content-center mx-0 w-100" id="message_input_container" >
                <!-- <div class="col-1 d-flex justify-content-end">
                    <i class="bi bi-emoji-smile h3 send_icon" id="emoji" ></i>
                </div> -->
                <div class="col-2 d-flex justify-content-center">
                    <i class="bi bi-share h3 send_icon" id="files"></i>
                    <input type="file" class="d-none" name='image' id="upload">
                </div>
                <div class="col-8 px-0 ">
                    <input type="text" id="message_input" name='message' class=" form-control font-weight-bold h-100" placeholder="write message">
                </div>
                
                <div class="col-1 justify-content-center d-flex ">
                    <i class="bi bi-send h3 send_icon" id="send_message" ></i>
                </div>
            </div>
            <!-- message input -->
            </div>
        </form>
        <!-- left side -->

        <!-- right side -->
        <div class=" col-md-4 d-md-block m-0 p-0 " id="right_section">
            <!-- user profile -->
            <div class="w-100 h-100 d-none" id="profile_settings">
                <div style="position: sticky;height: 100%;top: 0px">
                    <div class="align-items-end d-flex text-white" id="user_profile_bar">
                        <div class="d-flex align-items-center"  id="back_menu" style="cursor: pointer;">
                            <i class="bi bi-arrow-left mb-1 mx-2 h5"></i><span class="h4">Back</span>
                        </div>
                    </div>
                    <div id='alert'></div>
                    <form  id="form_image" onsubmit="event.preventDefault();">
                        <input type="submit" value='submit' class='d-none' userimage='{{auth()->user()->id}}' id='submit_image'>
                        <input type="file" name="image" class='d-none'  onchange="document.getElementById('submit_image').click();"  id="getImage">
                    </form>
                    <!-- forms of updating user image profile -->
                    <div style="overflow-y: auto;height: calc(100vh - 90px);" class="pb-5">
                        <div class="lines mb-2 h-50 align-items-center d-flex justify-content-center flex-column" style="height: 250px !important;">
                            <div id="profile_image" class="mx-2 my-2" style="width:200px;height:200px;position: relative;">
                                <div id="change_image" onclick="document.getElementById('getImage').click()" class="text-white d-none flex-column align-items-center justify-content-center" style="width: 100%;height:100%;position:absolute;z-index: 1;border-radius: 50%;background-color: #0000008c;cursor: pointer;">
                                    <i class="bi bi-camera-fill h4 "></i>
                                    <b class="text-justify ">change image profile</b>
                                </div>
                                <img src="{{auth()->user()->profile->image_profile()}}" class="rounded-circle myimage" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                        
                        <div class="lines mt-2 ">
                            <div class="d-flex justify-content-center mb-3 mt-2">
                                <form   id='form_username' class='w-100 mx-1'>
                                    <div class="text-left px-2 mx-lg-4 mx-auto font-weight-bold text-muted">
                                        Username
                                    </div>
                                    <div style='position: relative;' class="p-2 mx-lg-4 mx-auto">
                                        <i class="bi bi-plus-circle-fill h4" onclick="$('#form_name').click()" style="cursor: pointer;;position: absolute;left: 20px; top: 13px;"></i>
                                        <input type="text" class="m-auto form-control pl-5 w-100" id='username_input' placeholder="User name" name='name' autocomplete="off" value='{{auth()->user()->name}}'>
                                    </div>
                                    <input type="submit" id="form_name" class='d-none'>
                                </form>
                            </div>
                        </div>
                        <div class="lines mt-2 ">
                            <div class="d-flex justify-content-center mb-3 mt-2">
                                <form class='w-100 mx-1' id='form_status_profile'>
                                    <div class="text-left px-2 mx-lg-4 mx-auto font-weight-bold text-muted">
                                        Status
                                    </div>
                                    <div style='position: relative;' class="p-2 mx-lg-4 mx-auto">
                                        <i class="bi bi-plus-circle-fill h4" onclick="$('#form_status').click()" style="cursor: pointer;;position: absolute;left: 20px; top: 13px;"></i>
                                        <input type="text" class="m-auto form-control pl-5 w-100" id='username_input' placeholder="Status" name='description' value="{{auth()->user()->profile->description}}">
                                    </div>
                                    <input type="submit" id="form_status" class='d-none'>
                                </form>
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
                        <span><b class="h4 mx-2" id='te'>Chats</b></span>
                    </div>
                    <div class="mx-2" style="width:40px;height:40px;position: relative;">
                        <img src="{{auth()->user()->profile->image_profile()}}" class='myimage rounded-circle' class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                    </div>
                </div>
                <div id="right_menu" class="d-none">
                    <ul class="list-group">
                        <li class="list-group-item" id="apperances">Apperances</li>
                        <li class="list-group-item" id="profile">Profile</li>
                        <li class="list-group-item" id='log_out' onclick="event.preventDefault();">
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                      </ul>
                </div>
                <!-- right nav bar -->
                
                <!-- search for conv or friend -->
                <div>
                    <div style='position: relative;' id='test' class="p-2 mx-lg-4 mx-auto">
                        <i class="bi bi-search h4" style="position: absolute;left: 20px; top: 13px;"></i>
                        <input type="text" class="m-auto form-control pl-5 w-100" placeholder="Search for friend" id='search' mu='{{auth()->user()->id}}' autocomplete="off">
                        <ul class="list-group w-100 mt-2 px-2 d-none" id='search_results' style="position:absolute;z-index:1;left:0px">
                            <!-- <li class="list-group-item d-flex justify-content-end" data='{test}'  >
                                <b style='font-size:13px' class='align-self-center mx-2'>hello yasin</b>
                                <div>
                                    <img src="{{auth()->user()->profile->image_profile()}}" class="rounded-circle" style="width:30px;height:30px;" alt="profile">
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- search for conv or friend -->
                <!-- online users -->
                
                <div class="p-2 d-flex w-100 justify-content-end " style=" overflow-x:auto;">
                @foreach(auth()->user()->following as $friend)
                 <div>   
                    
                    <div blog='{"name":"{{$friend->user->name}}","id":"{{$friend->user->id}}","email":"{{$friend->user->email}}","status":"{{$friend->user->status}}","description":"{{$friend->user->description}}","image":"{{$friend->image_profile()}}"}'  class="mx-2 online friend" style="width:40px;height:40px;position: relative;">
                        <img src="{{$friend->image_profile()}}" class="rounded-circle " style="width:100%;height:100%;position: absolute;" alt="profile">
                    </div>
                </div>
                @endforeach
                </div>
                <!-- online users -->
                <!-- list of people -->
                <div id='friends_list'>
                    @foreach(auth()->user()->last_messages->SortByDesc('updated_at') as $friend)
                    <div blog='{"name":"{{$friend->profile->name}}","id":"{{$friend->profile->id}}","email":"{{$friend->profile->email}}","status":"{{$friend->profile->status}}","description":"{{$friend->profile->description}}","image":"{{$friend->profile->profile->image_profile()}}"}' ui='{{$friend->profile_id}}' class="list_friends  d-flex justify-content-between align-items-center p-2">
                        <small class="align-self-start font-weight-bold text-muted">
                            @if(now()->diffInDays($friend->updated_at)==0)
                                {{$friend->updated_at->format('h:i A')}}
                            @elseif(now()->diffInDays($friend->updated_at) < 7)
                                <b>Last </b>{{$friend->updated_at->format('D')}}
                            @else
                                {{$friend->updated_at->format('Y/m/d')}}
                            @endif
                        </small>
                        <div class="d-flex align-items-center ">
                            <div style="line-height: 20px;" class='text-right flex-column d-flex'>
                                <b>{{$friend->profile->name}}</b>
                                @if($friend->profile->messages->where('reciver_id',auth()->user()->id)->where('message_status','unread')->count() > 0)
                                <small class='font-weight-bold last_message'>{{$friend->last_message}}</small>
                                @else
                                <small class='text-muted last_message'>{{$friend->last_message}}</small>
                                @endif
                            </div>
                            <div class="mx-2 online" style="width:50px;height:50px;position: relative;">
                                @if($friend->profile->messages->where('reciver_id',auth()->user()->id)->where('message_status','unread')->count() > 0)
                                <div class='justify-content-center d-flex align-items-center pending' style='width: 17px;height: 17px;background-color: blue;position: absolute;z-index: 1;border-radius: 50%;top: -5px;font-size: 13px;'>
                                    {{$friend->profile->messages->where('reciver_id',auth()->user()->id)->where('message_status','unread')->count()}}
                                </div>
                                @else
                                <div class='justify-content-center d-none align-items-center pending' style='width: 17px;height: 17px;background-color: blue;position: absolute;z-index: 1;border-radius: 50%;top: -5px;font-size: 13px;'>
                                    0
                                </div>
                                @endif
                                <img src="{{$friend->profile->profile->image_profile()}}" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
                <!-- list of people -->
            </div>
        </div>
        <!-- right side -->
    </div>



    <!-- warning before block person -->
    <div class="align-items-center justify-content-center d-none" id="unfriend_warning" style="height: 100vh;width: 100vw;position: absolute;top: 0px;left: 0px;background-color: #0000007d;z-index:1;">
        <div class="p-5 rounded box_warning">
            <div class="text-center mt-3 h4">
                <b>Are you sure?</b>
            </div>
            <div class="d-flex justify-content-around mt-4 ">
                <div class="font-weight-bold  btn btn-success mx-2" id="cancel_block">cancle</div>
                <div class="text-white font-weight-bold btn btn-danger mx-2 "  id="unfriend_friend">Unfriend</div>
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
                <div class="text-white font-weight-bold btn btn-danger mx-2" id="delete_messages">Delete</div>
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
</div>


<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    // console.log("{{ env('PUSHER_APP_KEY') }}")
    var pusher = new Pusher('0fc33308824f759cdafe', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('user-'+{{auth()->user()->id}});
    channel.bind('App\\Events\\MessageEvent', function(data) {
        // alert(JSON.stringify(data));
        let same=JSON.parse(data.data)
        us=JSON.parse(data.data)
        let reciver_id=data.to;
        let sender_id=data.from;
        let message=data.message;
        let image='';
        if(data.image!=null){
            image='storage/'+data.image
        }
        let dt = new Date();
        let time = dt.getHours() + ":" + dt.getMinutes() +(dt.getHours()>=12? "PM":"AM");
        console.log('hi')
        console.log(data.image)
        console.log(image)
        console.log('hi')
        if($('#to').val()==sender_id){
            $('#messages').append(''+  //adding a message to chat
                '<div class="row mx-0 py-1">'+
                    '<div class="col-auto px-3 py-2" id="recived_message">'+
                        '<div id="tringle_recived"></div>'+
                        '<img src="'+image+'" class="w-100 rounded d-block" alt="">'+
                        '<b>'+message+'</b>'+
                        '<div class="align-items-center d-flex">'+
                            '<i class="bi bi-check-all"></i>'+
                            '<small class="font-weight-bold" style="font-size: 11px;">'+time+'</small>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '')
            $('[ui="'+sender_id+'"]').find('.last_message').text(same.message_pend)
            jQuery.ajax({
                url:'/home/readMessage/'+sender_id,
                method: 'POST'
            });
        }
        else{
            new Audio('img/test.mp3').play()
            // if($('.list_friends').length>0){
                let haveUser=true
                $('.list_friends').each(function() {
                    let user=$(this).attr('ui')
                    if(user==sender_id){
                        haveUser=false
                        $(this).prependTo('#friends_list');
                        var pending=Number($(this).find('.pending').text())
                        $(this).find('.pending').text(pending+1)
                        $(this).find('.pending').removeClass('d-none').addClass('d-flex');
                        $(this).find('.last_message').removeClass('text-muted').addClass('font-weight-bold').text(message)
                        return false                  
                    }
                    // else{
                    //     let user=JSON.parse(data.data) //if new user send you message it will appear in the friends list 
                    //     $('#friends_list').prepend(''+
                    //         "<div  blog='"+data.data+"' ui='"+user.id+"' class='list_friends ddd d-flex justify-content-between align-items-center p-2'>"+
                    //             '<small class="align-self-start font-weight-bold text-muted">'+time+'</small>'+
                    //             '<div class="d-flex align-items-center ">'+
                    //                 '<div style="line-height: 20px;" class="text-right flex-column d-flex">'+
                    //                     '<b>'+user.name+'</b>'+
                    //                     '<small class="font-weight-bold last_message">'+message+'</small>'+
                    //                 '</div>'+
                    //                 '<div class="mx-2 online" style="width:50px;height:50px;position: relative;">'+
                    //                     '<div class="justify-content-center d-flex align-items-center pending" style="width: 17px;height: 17px;background-color: blue;position: absolute;z-index: 1;border-radius: 50%;top: -5px;font-size: 13px;">1</div>'+
                    //                     '<img src="'+user.image+'" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">'+
                    //                 '</div>'+
                    //             '</div>'+
                    //         '</div>'+
                    //     '');
                    //     alert('appending')
                    //     return false     
                        
                    // }
                });//

                if(haveUser){
                    let user=JSON.parse(data.data) //if new user send you message it will appear in the friends list 
                    $('#friends_list').prepend(''+
                        "<div  blog='"+data.data+"' ui='"+user.id+"' class='list_friends ddd d-flex justify-content-between align-items-center p-2'>"+
                            '<small class="align-self-start font-weight-bold text-muted">'+time+'</small>'+
                            '<div class="d-flex align-items-center ">'+
                                '<div style="line-height: 20px;" class="text-right flex-column d-flex">'+
                                    '<b>'+user.name+'</b>'+
                                    '<small class="font-weight-bold last_message">'+message+'</small>'+
                                '</div>'+
                                '<div class="mx-2 online" style="width:50px;height:50px;position: relative;">'+
                                    '<div class="justify-content-center d-flex align-items-center pending" style="width: 17px;height: 17px;background-color: blue;position: absolute;z-index: 1;border-radius: 50%;top: -5px;font-size: 13px;">1</div>'+
                                    '<img src="'+user.image+'" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '');
                    return false     
                }



            // }
            // else{
            //     let user=JSON.parse(data.data)
            //     $('#friends_list').prepend(''+
            //     "<div  blog='"+data.data+"' ui='"+user.id+"' class='list_friends ddd d-flex justify-content-between align-items-center p-2'>"+
            //             '<small class="align-self-start font-weight-bold text-muted">'+time+'</small>'+
            //             '<div class="d-flex align-items-center ">'+
            //                 '<div style="line-height: 20px;" class="text-right flex-column d-flex">'+
            //                     '<b>'+user.name+'</b>'+
            //                     '<small class="font-weight-bold last_message">'+message+'</small>'+
            //                 '</div>'+
            //                 '<div class="mx-2 online" style="width:50px;height:50px;position: relative;">'+
            //                     '<div class="justify-content-center d-flex align-items-center pending" style="width: 17px;height: 17px;background-color: blue;position: absolute;z-index: 1;border-radius: 50%;top: -5px;font-size: 13px;">1</div>'+
            //                     '<img src="'+user.image+'" class="rounded-circle" style="width:100%;height:100%;position: absolute;" alt="profile">'+
            //                 '</div>'+
            //             '</div>'+
            //         '</div>'+
            //     '');
            // }
        }

    });
  </script>


@endsection
