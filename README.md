# 前提条件

docker docker-composeが入っていること

無い場合は以下コマンドでインストール
```
sudo apt install docker.io docker-compose
```

> dockerをsudoなしで動かしているのでエラーが出るかもしれません

以下コマンドでsudo無しでdockerを動かす
```
sudo groupadd docker
sudo gpasswd -a $USER docker
sudo systemctl restart docker
exit
```

# 初期設定
```
cd server/docker/

bash init.sh
```
