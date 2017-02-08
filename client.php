<!DOCTYPE html>
<html>
<head>
    <title>聊天?</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>

<div class="log"></div>

<textarea class="msg"></textarea>
<input class="button" type="button" class="send" value="送出">
</body>

<script>
var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    // console.log(e.data);
    $('.log')[0].innerHTML += e.data;
};

$(function() {
    $('.button').on('click', function() {
        conn.send($('.msg').val());
    });
});

</script>

</html>
