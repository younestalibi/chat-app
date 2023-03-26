import _ from 'lodash';
window._ = _;

import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// alert('hi hell')
import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '0fc33308824f759cdafe',
    cluster: 'eu',
    encrypted: true
});

    // $(document).on("visibilitychange", function() {
    //     if (document.hidden) {
    //         jQuery.ajax({
    //             url:'/home/Offline/'+$('#search').attr('mu'),
    //             method: 'get',
    //         });
    //         console.log('action offline')
    //     } else {
    //         jQuery.ajax({
    //             url:'/home/Online/'+$('#search').attr('mu'),
    //             method: 'get',
    //         });
    //         console.log('action online')
    //     }
    // });
    // $(document).ready(function() {
    //     jQuery.ajax({
    //             url:'/home/Online/'+$('#search').attr('mu'),
    //             method: 'get',
    //         });
    //         console.log('action online')
    // });
  
// alert('diiid')
// console.log('hisdf')
window.Echo.join('chat'
// {user_id: 'fakeUserId',name: 'Fake Usesr',user_info: {name: 'Fakes User',},}
)
    .here((users) => {
        users.forEach(ele => {
            console.log(ele.name)
            // alert('hi')
        });
    })
    .listen('UserOnline', (e) => {
        if(e.user.status=="online"){
            if($('#user_status').attr('ui')=='user-'+e.user.id){
                $('#user_status').text('online')
            }
            // alert('hi')
        }else{
            if($('#user_status').attr('ui')=='user-'+e.user.id){
                $('#user_status').text('offline')
            }
            // alert('hi')
        }
    })



    // .joining((user) => {
    //    console.log('someone got in '+user.name)
   
        
    //     if($('#user_status').attr('ui')=='user-'+user.id){
    //         $('#user_status').text('online')
    //     }
    //    jQuery.ajax({
    //     url:'/home/Online/'+user.id,
    //     method: 'get',
    // });
       
    // })

    // .leaving((user) => {
    //     console.log('someone leaves '+user.name)
        
    //     if($('#user_status').attr('ui')=='user-'+user.id){
    //         $('#user_status').text('offline')
    //     }
    //     jQuery.ajax({
    //         url:'/home/Offline/'+user.id,
    //         method: 'get',
    //     });
        
    // });
    