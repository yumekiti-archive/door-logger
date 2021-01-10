docker ps -qa | xargs docker stop && \
docker ps -qa | xargs docker rm && \
docker images -q | xargs docker rmi
