FROM nginx:1.10.0-alpine

#RUN apt-get update && apt-get install -y nginx

ADD nginx.conf /etc/nginx/conf.d/default.conf
ADD app.conf /etc/nginx/conf.d/default.conf

#RUN usermod -u 1000 www-data

#CMD ["nginx"]

EXPOSE 80
EXPOSE 443
EXPOSE 9123
