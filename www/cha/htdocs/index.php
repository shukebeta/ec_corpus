<?php
$keyword = isset($_REQUEST['keyword']) && trim($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : 'hello';
$result = `grep -ihre "${keyword}" /data/ec_corpus/四大经典词典双解版TXT`;
if(@$_REQUEST['html']) {
    $keyword = str_replace('/', "\\/", $keyword);
    $result = preg_replace("/(${keyword})/iu", '<font color="red">\1</font>', $result);
    $result = nl2br($result);
}
exit($result);
