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
    body {
        max-width: 720px;
    }
    .func{
        top: 80%;
        width: 320px;
        display: inline-block;
    }

    .func > textarea {
        float: left;
        display: block;
        width: 70%;
    }

    .func > input {
        float: left;
        display: block;
        height: 74px;
    }

    .log {
        overflow-y: scroll;
        border: 1px solid #ededed;
    }
    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="form-group">
                <div class="log"></div>
            </div>
            <div class="form-group func">
                <div class="row">
                    <div class="col-xs-10">
                        <textarea class="form-control msg" rows="3"></textarea>
                    </div>
                    <div class="col-xs-2">
                        <input class="btn btn-success send" type="button" value="送出">
                    </div>
                </div>
            </div>
        </form>
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