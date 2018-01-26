#!/bin/bash

# copying package.json required for webpack run
rm -f /var/www/symfony/app/package.json
cp -f /home/node/install/package.json /var/www/symfony/app

# Uncomment the following line if your node_modules have to be updated
if [ -d node_modules ]
then
    echo node_modules_exists ;
else
    echo copying_node_modules ;
    cp -a /home/node/install/node_modules /var/www/symfony/app;
fi &
wait

# Running webpack
#rm -f /home/node/app/public/build/*
./node_modules/.bin/encore dev --watch
