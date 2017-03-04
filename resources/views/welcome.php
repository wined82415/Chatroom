<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>聊天?</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .func{
        /*position: absolute;*/
        top: 80%;
        width: 320px;
        display: inline-block;
    }

    .func > textarea {
        float: left;
        display: block;
        width: 70%;
        /*width: 200%;*/
    }

    .func > input {
        float: left;
        display: block;
        height: 74px;
    }

    .log {
        overflow-y: scroll
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="log"></div>
        <div class="func">
            <textarea class="form-control msg" rows="3"></textarea>
            <input class="btn btn-success send" type="button" value="送出">
        </div>
    </div>
    <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            var msgHtml = '<div class="well">';

            $('.log').append(msgHtml + e.data + '</div>');
        };

        $(function() {
            $('.send').on('click', function() {
                conn.send($('.msg').val());
            });
        });
    </script>
</body>
</html>