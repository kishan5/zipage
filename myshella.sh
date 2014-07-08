#!/bin/sh
ADD1="$1"
FOLDER1="$2"
wget -e robots=off -H -nd -nc -np -p -l1 -A jpg,jpeg -w 3 -P /var/www/test/$FOLDER1 $ADD1
files=/var/www/test/*
for file in $files
do
   chmod 777 "$file"
done
files2=/var/www/test/$FOLDER1/*
for file in $files2
do
   chmod 777 "$file"
done
