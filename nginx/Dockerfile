FROM nginx:1.20-alpine

# Copy the public directory
COPY . /code

RUN apk add python3 python3-dev py3-pip build-base libressl-dev musl-dev libffi-dev rust cargo
RUN pip3 install pip --upgrade
RUN pip3 install certbot-nginx
RUN mkdir /etc/letsencrypt

# Copy the nginx config file
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
