# 前提条件

docker docker-composeが入っていること

無い場合は以下コマンドでインストール
```
sudo apt install docker.io docker-compose
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
