# docker/node/Dockerfile
# See https://github.com/nodejs/docker-node#dockerfile
FROM node:6

EXPOSE 8888

USER node

# create work dir : install to run npm install and app to copy node module after container run
RUN mkdir /home/node/install/
RUN mkdir /home/node/app

# delete existing modules and re-install dependencies
WORKDIR /home/node/install/
COPY ./package.json package.json
COPY package-lock.json package-lock.json
RUN rm -rf node_modules
RUN npm install

# installing globally useful nodes
USER root
RUN npm install --global webpack
RUN npm install --global vue-cli

# Always use this syntax to avoid wildcard issues - Run cp in CMD to avoid mount overwritting
WORKDIR /var/www/symfony/app

CMD rm -rf /var/www/symfony/app/package.json \
    && cp -rp /home/node/install/node_modules/. /home/node/app/node_modules \
    && cp /home/node/install/package.json /var/www/symfony/app \
    && ./node_modules/.bin/encore dev --watch