$(()=>{
    var right_menu=true
    $('#user_menu_icon').on('click',function(){
        
        if(right_menu==true){
            $('#right_menu').removeClass('d-none')
            $('#user_menu_icon').addClass('text-success')
            right_menu=false
        }
        else{
            $('#right_menu').addClass('d-none')
            $('#user_menu_icon').removeClass('text-success')
            right_menu=true
        }
    })
    var friend_profile=true
    $('#person').on('click',function(){
        
        if(friend_profile==true){
            $('#friend_profile').removeClass('d-none')
            $('#person').css('color','green')
            friend_profile=false
        }
        else{
            $('#friend_profile').addClass('d-none')
            $('#person').css('color','')
            friend_profile=true
        }
    })

    $('#profile').on('click',function(){
            $('#profile_settings').removeClass('d-none')
    })
    $('#back_menu').on('click',function(){
        $('#profile_settings').addClass('d-none')
        $('#right_menu').addClass('d-none')
        $('#user_menu_icon').removeClass('text-success')
        right_menu=true
    })

    $('#unfriend_user').on('click',function(){
        $('#unfriend_warning').removeClass('d-none')
        $('#unfriend_warning').addClass('d-flex')
    })
    
    $('#cancel_block').on('click',function(){
        $('#unfriend_warning').removeClass('d-flex')
        $('#unfriend_warning').addClass('d-none')
    })
    $('#unfriend_friend').on('click',function(){
        $('#unfriend_warning').removeClass('d-flex')
        $('#unfriend_warning').addClass('d-none')
        let friend=$('#to').val()
        jQuery.ajax({
            url:'/home/unfriend/'+friend,
            method: 'post',
            success: function(data){
                $('#alert').html(''+
                '<div class="alert row my-0 alert-warning alert-dismissible  fade show" style="width:100vw;overflow: hidden;" id="alert" role="alert">'+
                    '<strong>'+data+'</strong>'+
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                '</div>'+
                '')

            }
        });
    })

    
    $('#delete_conversation').on('click',function(){
        $('#delete_warning').removeClass('d-none')
        $('#delete_warning').addClass('d-flex')
    })
    
    $('#cancel_delete').on('click',function(){
        $('#delete_warning').removeClass('d-flex')
        $('#delete_warning').addClass('d-none')
    })
    $('#delete_messages').on('click',function(){
        $('#delete_warning').removeClass('d-flex')
        $('#delete_warning').addClass('d-none')
        let friend=$('#to').val()
        jQuery.ajax({
            url:'/home/deleteMessages/'+friend,
            method: 'get',
            success: function(data){
                alert(data)
            }
        });

    })
    // hover on picture in user profile
    $("#profile_image").hover(function(){
        $('#change_image').removeClass('d-none')
        $('#change_image').addClass('d-flex')
      },
      function(){
        $('#change_image').addClass('d-none')
        $('#change_image').removeClass('d-flex')
      });
    // hover on picture in user profile

    // responsive page functionality 
    function open_conversation_window(){
        $('#right_section').addClass('d-none')
        $('#left_section').removeClass('d-none')
        $('#switch_to_list').removeClass('d-none')
        $('.list_friends').css('background-color','')
        $(this).css('background-color','#a8a8a8')
    }
    // $(document).on('click','.ddd',function(){
    //     alert('adada')
    // })
    $(document).on('click','.list_friends, .friend',function(){
        // fill the data
        let user=JSON.parse($(this).attr('blog'))
        $('.user_name').text(user.name)
        $('#user_email').text(user.email)
        $('#user_description').text(user.description)

        $('#user_status').text(user.status).attr('ui','user-'+user.id)

        $('.user_image').attr('src',user.image)
        $('#to').val(user.id)
        $('#messages').html('')
        $('#addFriend').addClass('d-none')
        $(this).find('.last_message').addClass('text-muted').removeClass('font-weight-bold') 
        $(this).find('.pending').text('').addClass('d-none').removeClass('d-flex');
        jQuery.ajax({
            url:'/home/readMessage/'+user.id,
            method: 'POST'
        });
        console.log('{{auth()->user()->id}}')
        open_conversation_window()
        $('#welcome_message').removeClass('d-flex').addClass('d-none')
        // getting messages
        jQuery.ajax({
            url:'/home/getMessages/'+user.id,
            method: 'get',
            beforeSend: ()=>{
                $('#loader').removeClass('d-none')
            },
            success: function(data){
                if(data){
                    $('#loader').addClass('d-none')
                    let img=1;
                    let imag_count=Number($('#count_images').html())
                    
                    data.forEach(message => {
                        if(message.image!=null){
                            
                            $('#media').prepend(''+
                            '<div class="col-4 my-3">'+
                                '<img src="storage/'+message.image+'" class="w-100 h-100" alt="">'+
                            '</div>'+
                            '')
                            $('#media-'+img).attr('src',"storage/"+message.image)
                            img==3?img=1:img++
                            imag_count++
                        }
                        $('#count_images').html(imag_count)
                        let image='';
                        if(message.image!=null){
                            image='storage/'+message.image        
                        }
                        if(message.reciver_id==user.id){
                            $('#messages').append(''+
                            '<div class="row justify-content-end mx-0 py-1">'+
                                '<div class="col-auto px-3 py-2" id="sent_message">'+
                                    '<div id="tringle_sent"></div>'+
                                    '<img src="'+image+'" class="w-100 rounded d-block" alt="">'+
                                    '<b>'+message.message+'</b>'+
                                    '<div class="align-items-center d-flex">'+
                                        '<i class="bi bi-check-all"></i>'+
                                        '<small class="font-weight-bold" style="font-size: 11px;">00:00</small>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '')
                        }else{
                            $('#messages').append(''+
                            '<div class="row mx-0 py-1">'+
                                '<div class="col-auto px-3 py-2" id="recived_message">'+
                                    '<div id="tringle_recived"></div>'+
                                    '<img src="'+image+'" class="w-100 rounded d-block" alt="">'+
                                    '<b>'+message.message+'</b>'+
                                    '<div class="align-items-center d-flex">'+
                                        '<i class="bi bi-check-all"></i>'+
                                        '<small class="font-weight-bold" style="font-size: 11px;">55</small>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '')

                        }
                    });
                }
                else{
                    console.log('data is not exist')
                    $('#loader').addClass('d-none')
                }
            }
        });
        jQuery.ajax({
            url:'/home/checkFollow/'+user.id,
            method: 'get',
            success: function(data){
                if(!data){
                    $('#addFriend').removeClass('d-none');
                }
            }
        });
        // getting messages
        
    })
    $('#switch_to_list').on('click',function(){
        $('#right_section').removeClass('d-none')
        $('#left_section').addClass('d-none')
        $('#switch_to_list').addClass('d-none')
    })
    // responsive page functionality 
 
    // show media 
    $('#all_media').on('click',function(){
        $('#media_section').removeClass('d-none')
        $('#friend_profile').addClass('d-none')
    })
    $('#switch_to_leftmenu').on('click',function(){
        $('#media_section').addClass('d-none')
        $('#friend_profile').removeClass('d-none')
    })
    // show media 

    // dark light mode 
    $('#apperances').on('click',function(){
        $('#change_mode').removeClass('d-none') 
        $('#change_mode').addClass('d-flex')
    })
    $('#cancel_change_mode').on('click',function(){
        $('#change_mode').removeClass('d-flex')
        $('#change_mode').addClass('d-none')
    })
    $('#save_mode').on('click',function(){
        if($('#lightmode').is(':checked')){
            $('#css_mode').attr('href','style/light.css')
            $('#lightmode').attr(':checked')
            jQuery.ajax({
                url: '/home/mode',
                method: 'get',
                data: {mode:'style/light.css'},
                success: function(data) {
                    console.log('done'+data)
                }
            })
        }
        else if($('#darkmode').is(':checked')){
            $('#css_mode').attr('href','style/dark.css')
            $('#darkmode').attr(':checked')
            jQuery.ajax({
                url: '/home/mode',
                method: 'get',
                data: {mode:'style/dark.css'},
                success: function(data) {
                    console.log('done'+data)
                }
            })
        }
        $('#change_mode').removeClass('d-flex')
        $('#change_mode').addClass('d-none')

    })
    // dark light mode
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            // "Content-Type": "multipart/form-data"
        }
    });
    // sending message
    $('#send_message').on('click',function(){
        $('#form').submit()
    })
    $('#upload').change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#imgPreview")
                  .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
            $('#preview_container').removeClass('d-none')
        };
    })
    $('#remove_image').on('click',function(){
        $('#preview_container').addClass('d-none')
        $('#imgPreview').attr('src','')
        $('#upload').val(null)
    })

    $('#form').submit(function(e) {
        e.preventDefault();
        var dt = new Date();
        let to=$('#to').val()
        var time = dt.getHours() + ":" + dt.getMinutes() +(dt.getHours()>=12? "PM":"AM");
        if($( "#message_input" ).val().length>0 || $('#upload').val().length>0){
            console.log('sending')            
            jQuery.ajax({
                url: '/home/send',
                method: 'post',
                data: new FormData(this),
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.list_friends').each(function() {
                        let user=$(this).attr('ui')
                        if(user==to){
                            $(this).prependTo('#friends_list');
                            $(this).find('.last_message').text($('#message_input').val())
                        }
                    });
                    $('#messages').append(''+
                    '<div class="row justify-content-end mx-0 py-1">'+
                        '<div class="col-auto px-3 py-2" id="sent_message">'+
                            '<div id="tringle_sent"></div>'+
                            '<img src="'+ $('#imgPreview').attr('src')+'" class="w-100 rounded d-block" alt="">'+
                            '<b>'+$( "#message_input" ).val()+'</b>'+
                            '<div class="align-items-center d-flex">'+
                                '<i class="bi bi-check-all"></i>'+
                                '<small class="font-weight-bold" style="font-size: 11px;">'+time+'</small>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '')
                 },
                success: function(data){
                    console.log('return : '+data)
                    // console.log(JSON.parse(data))   //this ajax request is for sending image if the old method doesn't work this is not best practice in case
                    // jQuery.ajax({
                    //     url: '/home/throw',
                    //     method: 'get',
                    //     data: JSON.parse(data),
                    //     success: function(data) {
                    //         console.log(JSON.parse(data))
                    //     }
                    // })
                },
            });
        }
        $( "#message_input" ).val('')
        $('#preview_container').addClass('d-none')
        $('#imgPreview').attr('src','')
        $('#upload').val(null)
    })
    // sending message


    // input message icons effect
    $( "#message_input" )
        .focus(function() {
            $('#send_message').css('transform','rotate(45deg)')
            $('#send_message').addClass('text-primary')

            $('#emoji').removeClass('bi-emoji-smile')
            $('#emoji').addClass('bi-emoji-sunglasses text-primary')

            $('#files').removeClass('bi bi-share')
            $('#files').addClass('bi bi-share-fill text-primary')


        })
        .focusout(function(){
            $('#send_message').css('transform','rotate(0deg)')
            $('#send_message').removeClass('text-primary')

            $('#emoji').addClass('bi-emoji-smile')
            $('#emoji').removeClass('bi-emoji-sunglasses text-primary')

            $('#files').addClass('bi bi-share')
            $('#files').removeClass('bi bi-share-fill text-primary')
        });
        $('#files').on('click',function(){
            $('#upload').click()
        })
    // input message icons effect


    
    // log out request
    $('#log_out').on('click',function(){
        location.href = "{{ route('logout') }}"
        $('#logout-form').submit()
    })
    // log out request

    // search
      $( "#search" )
        .focus(function() {
            $('#search_results').removeClass('d-none')
        })
        .focusout(function(){
            setTimeout(() => {
                $('#search_results').addClass('d-none') //i set timeout to fire this function after select user
                $('#search').val('')
            }, 200);
            
        })
        .on('keyup', function(){
            search=$(this).val()
            let user_id=$(this).attr('mu')
            if(search.length>0){
                jQuery.ajax({
                    url:'/home/search/'+search,
                    method: 'get',
                    success: function(data){
                        $('#search_results').html('')
                        data.forEach(ele => {
                            if(ele.id!=user_id){
                                let data=JSON.stringify(ele)
                                $('#search_results').prepend(''+
                                "<li class='list-group-item d-flex justify-content-end' blog='"+data+"' >"+
                                    '<b style="font-size:13px" class="align-self-center mx-2 text-danger">'+ele.name+'</b>'+
                                    '<div>'+
                                        '<img src="storage/'+ele.image+'" class="rounded-circle" style="width:30px;height:30px;" alt="profile">'+
                                    '</div>'+
                                '</li>'+
                                '')
                            }
                        });
                    }
                });
            }
            if(search.length==0){$('#search_results').html('')}
        })
    // search
        
    // select friend after search
    $('#search_results').on('click','li',function(){
        let user=JSON.parse($(this).attr('blog'))
        $('.user_name').text(user.name)
        $('#user_email').text(user.email)
        $('#user_description').text(user.description)
        $('#user_status').text(user.status)
        $('.user_image').attr('src','storage/'+user.image)
        $('#to').val(user.id)
        $('#search_results').on('click',()=>{open_conversation_window()}) //phone size
        $('#welcome_message').removeClass('d-flex')
        $('#welcome_message').addClass('d-none')
        jQuery.ajax({
            url:'/home/checkFollow/'+user.id,
            method: 'get',
            success: function(data){
                if(!data){
                    $('#addFriend').removeClass('d-none');
                }
            }
        });

    })
    // select friend after search


    $("#add_friend").on('click',()=>{
        profile_id=$('#to').val()
        jQuery.ajax({
            url:'/home/follow/'+profile_id,
            method: 'get',
            success: function(data){
                $('#addFriend').addClass('d-none');
            }
        });
    })
 
            // $(document).on("visibilitychange", function() {
            //     if (document.hidden) {
            //         jQuery.ajax({
            //             url:'/home/Offline/'+$('#search').attr('mu'),
            //             method: 'get',
            //         });
            //     } else {
            //         jQuery.ajax({
            //             url:'/home/Online/'+$('#search').attr('mu'),
            //             method: 'get',
            //         });
            //     }
            // });
            // $(document).ready(function() {
            //     jQuery.ajax({
            //             url:'/home/Online/'+$('#search').attr('mu'),
            //             method: 'get',
            //         });
            // });

            // <div style="width:300px">
            //     <img src="img/profile.webp" width="300" class=" rounded d-block" alt="">
            //     <b>hello how are you doing ? Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam iusto dolores, veniam optio consectetur sit culpa tempore quisquam nesciunt quis delectus non obcaecati eum eveniet recusandae fugiat nisi fuga soluta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, maiores. Aspernatur excepturi veritatis optio qui minima, ut sequi iusto, perspiciatis necessitatibus nostrum autem, iure quae soluta neque deleniti laudantium iste.</b>
            // </div>


            // $('#form').submit(function(e) {
            //     e.preventDefault();
            //     var formData = new FormData(this);
                
            //     $.ajax({
            //       url: '/home/send',
            //       type: 'post',
            //       data: formData,
            //       cashe:false,
            //       processData: false,
            //       contentType: false,
            //       enctype: 'multipart/form-data',
            //       success: function(data) {
            //         console.log(data)
            //       }
            //     });
            //   });

            // $('#button').click(function() {
            //     // Check if the browser is using the Ctrl key or the Command key
            //     var isCtrl = false;
            //     if (navigator.platform.indexOf('Mac') !== -1) {
            //       isCtrl = event.metaKey;
            //     } else {
            //       isCtrl = event.ctrlKey;
            //     }
            //     // Trigger the keydown event with the appropriate key code
            //     $.Event('keydown', {
            //         keyCode:91,
            //         // keyCode:190
                    
            //     });

                
            //   });
           

            $(document).on("visibilitychange", function() {
                if (document.hidden) {
                    jQuery.ajax({
                        url:'/home/Offline/'+$('#search').attr('mu'),
                        method: 'post',
                        success:function(){
                            // alert('onffline')
                        }
                    });
                    console.log('offline')
                } else {
                    jQuery.ajax({
                        url:'/home/Online/'+$('#search').attr('mu'),
                        method: 'post',
                        success:function(){
                            // alert('online')
                        }
                    });
                    console.log('online')
                }
            });
            $(document).ready(function() {
                jQuery.ajax({
                        url:'/home/Online/'+$('#search').attr('mu'),
                        method: 'post',
                    });
                    console.log('online')
            });


             $('#form_image').submit(function(e) {
                e.preventDefault();
                let user=$('#submit_image').attr('userimage')
                console.log(user)
                jQuery.ajax({
                    url: '/home/update/image/'+user,
                    method: 'post',
                    data: new FormData(this),
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".myimage").attr('src','storage/'+data.message);
                        $('#alert').html(""+
                            "<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
                                "<strong>"+data.update_succeeded+"</strong>"+
                                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>"+
                            "</div>"+
                        "");
                    }
                })
                
              });
              

            $('#form_username').submit(function(event) {
                event.preventDefault();
                let user=$('#submit_image').attr('userimage')
                let formData = $(this).serialize();
                $.ajax({
                url: '/home/update/name/'+user,
                method: 'patch',
                data: formData,
                success: function(data) {
                    $('#alert').html(""+
                        "<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
                            "<strong>"+data.update_succeeded+"</strong>"+
                            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>"+
                        "</div>"+
                    "");
                }
                });
            });
              
            $('#form_status_profile').submit(function(event) {
                event.preventDefault();
                let user=$('#submit_image').attr('userimage')
                let formData = $(this).serialize();
                $.ajax({
                url: '/home/update/status/'+user,
                method: 'patch',
                data: formData,
                success: function(data) {
                    $('#alert').html(""+
                        "<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
                            "<strong>"+data.update_succeeded+"</strong>"+
                            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>"+
                        "</div>"+
                    "");
                }
                });
            });

           

              


          

    
})
