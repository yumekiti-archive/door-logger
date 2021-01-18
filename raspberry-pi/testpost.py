import requests
import json

# 以下後に変更

# URLの設定
url = "http://localhost:8010/api/device/door"

# トークンの設定
token = "9ea37e2201d3ccb51af802e915cb59e4b4f1c21db49d0a14e2a02938c190fd5e"

# 変更：ここまで

# ドアセンサーのon off設定
door_sw = False

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token, "Accept" : "application/json", 'Content-Type': 'application/json'}

# サーバーへPOSTする
params = { "is_open": door_sw }
json = json.dumps(params)

res = requests.post(url, json, headers=headers)
print(res)
print(res.json())
# 終わり
print("end")
