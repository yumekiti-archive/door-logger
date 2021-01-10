# 初期設定でやっていること

権限周りを解決するため以下コマンドで対処
```
export user=$(id -u):$(id -g)
```

コンテナを立てるためdockerファイル内で以下コマンドで立てる
```
docker-compose up --build -d
```

### 以下コマンドでdocker内に入る
```
docker exec -it ranking-site-php bash
```

### PHPコンテナ内の/var/www/html/laravel内で以下コマンドでインストール

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

### laravel.logがないので作成したり権限周り。
```
touch storage/logs/laravel.log

chmod 777 storage/logs/laravel.log
chmod 777 storage/framework/sessions/
chmod 777 storage/framework/views/
```

### データベースの作成

```
php artisan migrate
```
