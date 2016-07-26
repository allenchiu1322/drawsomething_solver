<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>drawsomething cheat</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    function tryit() {
        $('#result').html('');
        var check = true;
        if (check) {
            var count = $('#count').val();
            if (count.match(/[0-9]{1,2}/) == count) {
            } else {
                check = false;
                $('#result').html('請輸入數字');
            }
        }
        if (check) {
            var letters = $('#letters').val();
            if (letters.match(/[A-Za-z]{1,14}/) == letters) {
            } else {
                check = false;
                $('#result').html('請輸入字母');
            }
        }
        if (check) {
            if (letters.length < count) {
                check = false;
                $('#result').html('待選字母小於答案長度');
            }
        }
        if (check) {
            $('#result').html('');
            $('#result').html('搜尋中....');
            $.ajax({
                url: 'draw2.php',
                data: { c: count, l: letters },
                async: false,
                success: function(r) {
                    $('#result').html(r);
                }
            });
        }
    }
    $('#find').click(function() {
        $('#find').attr('disabled', 'disabled');
        tryit();
        $('#find').removeAttr('disabled');
    });
});
</script>
</head>
<body>
題目有幾個字母空格: <input type="text" id="count"><br />
有哪些字母可供填選: <input type="text" id="letters"><br />
<input type="button" value="找答案" id="find"><br />
可能的答案:
<div id="result"></div>
</body>
</html>
