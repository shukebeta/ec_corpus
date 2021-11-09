# ec_corpus

An English/Chinese corpus query service in one PHP file

在你的vps上快速搭建"英汉单句查询服务"，就是基于某个单词或者某个短语查英文例句（及其对应的汉语解释）。

[这是一个例子](https://corpus.shukebeta.com/world) 欢迎点击查看效果

克隆下版本库之后，你需要修改 

images/nginx/config/yoursite.com.conf 中的下面这行：

```server_name localhost cha.shukebeta.com;```

把 cha.shukebeta.com 换成你自己的域名。

使用方法：

1. 克隆版本库
2. 把域名改成自己的
3. 进入项目目录，执行 docker-compose up -d （初次执行会比较慢，因为要build nginx/php 镜像）
4. 打开浏览器，输入 http://yourdomain/yourkeyword




