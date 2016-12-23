FROM nginx
COPY nginx.conf /etc/nginx/nginx.conf

ADD bundle.crt /etc/nginx/bundle.crt
ADD saloneses.key /etc/nginx/saloneses.key
ADD message.conf /etc/nginx/conf.d/message.conf
ADD saloneses.conf /etc/nginx/conf.d/salonese.conf
ADD saloneses-static.conf /etc/nginx/conf.d/salonese-static.conf
ADD saloneses-ssl.conf /etc/nginx/conf.d/salonese-ssl.conf
ADD dev.conf /etc/nginx/conf.d/dev.conf
ADD training.conf /etc/nginx/conf.d/training.conf
