# docker/node/Dockerfile
# See https://github.com/nodejs/docker-node#dockerfile
FROM node:6

EXPOSE 8888

USER node

# create work dir : install to run npm install and app to copy node module after container run
RUN mkdir /home/node/install/
RUN mkdir /home/node/app/

# delete existing modules and re-install dependencies
WORKDIR /home/node/install/
COPY ./package.json package.json
COPY package-lock.json package-lock.json
RUN rm -rf node_modules
RUN npm install

# copying node modules after run
WORKDIR /home/node/app/

# Always use this syntax to avoid wildcard issues
CMD cp -R /home/node/install/node_modules/* /home/node/app/node_modules