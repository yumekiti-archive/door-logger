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

# 初期設定でやっていること

権限周りを解決するため以下コマンドで対処
```
export user=$(id -u):$(id -g)
```

コンテナを立てるためdockerファイル内で以下コマンドで立てる
```
docker-compose up --build -d
```

### docker-compose exec php でコンテナ内を操作

PHPのパッケージ管理システムをインストールする
```
composer install
```

### インストール完了後envファイルをコピーする
```
cp .env.example .env
```

### アプリケーションを暗号化するためのキーを生成する
```
php artisan key:generate
```

### データベースの作成

```
php artisan migrate
```

##### 開発で使用したパッケージ

```development.sh
sudo apt install php-mbstring php-xml php-json

sudo apt install vsftpd
```

> vsftpdの設定

```
# /etc/vsftpd.conf以下変更
write_enable=YES
```
