cd ./docker/nginx/ssl/ && \
openssl req -x509 -nodes -new -keyout server.key -out server.crt -days 365 && \
cd ../../ && \
sed -i -e "s/image: nginx/build: .\//g" docker-compose.yml && \
sed -i -e "12d" docker-compose.yml && \
cd ../