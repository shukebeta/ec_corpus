<?php

$keyword = trim($_REQUEST['keyword']) != 'index.php' ? trim($_REQUEST['keyword']) : 'hello';

$keyword_input = str_replace('"', '&quot;', $keyword);
echo <<<html
<html>
<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />  <!-- 360浏览器访问页面默认用极速核 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!-- 优先使用IE最新版本 -->
    <meta name="description" content="查例句, 你输入一个词汇，或者一个短语，我帮你找出例句。" />
    <meta name="keywords" content="查例句" />
    <title>例句：{$keyword}</title>
</head>
<body>
<h1>查例句</h1>
<form action="/">
<input id="inputbox" type="text" name="keyword" value="$keyword_input" style="font-size:18px; width:400px;height:50px" />
<button type="submit" style="font-size:18px;width:100px;height:50px">查例句</button> <br />
<p style="font-size:11px">Tips：</p>
<ul style="font-size:10px">
<li>想只匹配 <code>world</code> 而不匹配 <code>worldcup</code>之类的词, 输入 <code>world\b</code></li>
<li>想只匹配 <code>worldcup</code> 之类的词而不匹配纯粹的 <code>world</code>, 输入 <code>world\B</code></li>
<li>如果你很懂正则表达式，它还能更强大</li>
</ul>
</form>

<script>
document.getElementById('inputbox').focus();
document.getElementById('inputbox').select();
</script>

<h2>匹配结果</h2>
html;

$dict = [
    '/' => '\\/',
    '"' => '\\"',
];
$keyword = strtr($keyword, $dict);

$result = `grep -ihre "${keyword}" /data/ec_corpus/四大经典词典双解版TXT`;
if (!$result) {
    $result = '抱歉，关键字<font color="red"> ' . $keyword_input . ' </font>一个例句也没找到。';
}
if(@$_REQUEST['html']) {

    $result = preg_replace("/(${keyword})/iu", '<font color="red">\1</font>', $result);
    $result = str_replace("\n", "<p>", $result);
}
echo $result;


echo <<<html
</body>
</html>
html;
