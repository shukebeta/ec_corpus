#!/bin/bash
chmod 600 /var/spool/cron/crontabs/root
if [ ! -d "/data/ec_corpus/四大经典词典双解版TXT" ]; then
    cd /data/ec_corpus
    tar zxvf /www/cha/ec_corpus.tgz
fi
/usr/bin/php-fpm
service rsyslog start
service cron start
/bin/bash

