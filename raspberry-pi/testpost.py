import requests

# 以下後に変更

# URLの設定
url = "http://192.168.11.31:8010/api/device/door"

# トークンの設定
token = "9ea37e2201d3ccb51af802e915cb59e4b4f1c21db49d0a14e2a02938c190fd5e"

# 変更：ここまで

# ドアセンサーのon off設定
door_sw = True

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token}

# サーバーへPOSTする
params = { "data": { "is_open": door_sw == False } }
res = requests.post(url, params)

# 終わり
print("end")
