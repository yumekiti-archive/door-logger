# 自部屋警備員

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
bash pac.sh
```

- sudo無しdocker
```
bash docker.sh
```

- 起動させる
```
bash run.sh
```

- 仮のデータを入れる
```
bash seed.sh
```

- nodeのバージョンが合っていない場合
```
bash nvm.sh
```
```
bash nodeupdate.sh
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

- raspberry piの12ピンとgrandに刺しておく

- `door-logger/raspberry-pi/`内で以下コマンド
```
python3 post.py
```

# 消したい場合

`door-logger/server/docker`に移動し以下コマンドで削除
```
bash delete.sh
```
