FROM nginx:latest
#FROM nginx:alpine

RUN rm -rf /usr/share/nginx/html
ADD css /usr/share/nginx/html/css
ADD files /usr/share/nginx/html/files
ADD images /usr/share/nginx/html/images
ADD *.html /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]

