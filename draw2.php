<?php
$count = $_GET['c'];
$letters = strtoupper($_GET['l']);
$fp = fopen('/usr/share/dict/words', 'r');
if ($fp) {
    $out = '';
    while (($buf = fgets($fp, 4096)) !== false) {
        //單字長度
        $buf = str_replace("'", '', strtoupper(trim($buf)));
        if (strlen($buf) == intval($count)) {
            //試著找符合的答案
            $buf2 = $buf;
            for($i = 0; $i < strlen($letters); $i++) {
                $char = substr($letters, $i, 1);
                $buf2 = pop_char($buf2, $char);
//                $buf2 = str_replace($char, '', $buf2);
            }
            if ($buf2 == '') {
                $out .= $buf . '<br />';
            }
        }
    }
    fclose($fp);
    if ($out == '') {
        $out = '沒有答案';
    }
    echo($out);
} else {
    echo('無法開啟字典檔');
}

function pop_char($string, $char) {
    $poped = FALSE;
    $result = '';
    for($i = 0; $i <= strlen($string); $i++) {
        if (substr($string, $i, 1) == $char) {
            if ($poped) {
                $result .= substr($string, $i, 1);
            } else {
                $poped = TRUE;
            }
        } else {
            $result .= substr($string, $i, 1);
        }
    }
    return $result;
}

?>
