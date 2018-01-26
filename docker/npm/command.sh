#!/bin/bash

# copying package.json required for webpack run
rm -f /var/www/symfony/app/package.json
cp -f /home/node/install/package.json /var/www/symfony/app

# Uncomment the following line if your node_modules have to be updated
if [ test -d node_modules ]
then
    echo node_modules_exists ;
else
    cp -a /home/node/install/node_modules /usr/src/app;
fi

# Running webpack
#rm -f /home/node/app/public/build/*
./node_modules/.bin/encore dev --watch