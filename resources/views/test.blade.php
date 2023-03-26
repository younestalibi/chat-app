<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <form id="form" >
    <!-- @method('post') -->
    <input type="text" name="name" id="text1" value="foo" /><br>
    <input type="text" name="email" id="text2" value="bar" /><br>
    <input type="file" name="file" id="file" /><br>
    <input type="checkbox" name="check" checked disabled /><br>
    <input type="submit" value="send">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
$(function(){

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $("#form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('to',3)

        for (var [key, value] of formData.entries()) {
            console.log(key + ': ' + value);
        }
        // formData.append('test','hello bro')
    
        $.ajax({
            url: '/home/test',
            method: 'post',
       
            // data: {
            //     name: 'John',
            //     email: 'john@example.com',
            //     file:$('#file')[0].files[0]
            // },
            data: new FormData(this),
            // contentType: 'multipart/form-data',
            cache:false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
            },
            
        });
    });

})

</script>
</body>
</html>