##### 自部屋警備員

# 起動方法

## 前提条件
- 8010ポートが使われていないこと

## ovaの場合
`パスワード：asd`

パスワードを数回入力すると立ち上がります

## gitからの場合

githubからダウンロードしてくる
```
git clone https://github.com/yumekiti/door-logger.git
```

以下からは`door-logger/server/docker/`で作業している

- パッケージを入れる
```
make pac
```

- sudo無しdocker
```
make gpas
```

- 初期起動
```
make init
```

2回目以降の起動
```
make up
```

停止
```
make down
```

- 仮のデータを入れる
```
make seed
```

- nodeのバージョンが合っていない場合

```
make nvm
```
```
make nodeupdate
```

## raspberry piへの設定

- githubからダウンロードしてくる
```
git clone https://github.com/yumekiti/door-logger.git
```

- python3が入っていること、以下無い場合
```
bash pac.sh
```

- raspberry piの18ピンとgrandに刺しておく

- `door-logger/raspberry-pi/`内で以下コマンド
```
python3 post.py

トークンを入力
ホストipとポート入力
```

# 消したい場合

`door-logger/server/docker`に移動し以下コマンドで削除
```
make rm
```
