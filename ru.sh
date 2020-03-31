#!/bin/bash

day=$(date | cut -d' ' -f 3);
curl http://ru.ufsc.br/ru/ 2> /dev/null | grep -A7 -B1 '<strong>'$day | sed 's/<td.*">//g ; s/<strong>//g ; s/<\/strong>//g ; s/<\/td>//g ; s/<\/p>//g ' | sed -e :a -e '$!N;s/\n<p>/ /;ta' -e 'P;D' | sed 's| *\/ *|\/|g' | awk 'NR==1{print "* "$0" *";next};{print "• "$0}';
