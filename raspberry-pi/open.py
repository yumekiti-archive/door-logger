import requests
import json

# 以下後に変更

# URLの設定
url = "http://localhost:8010/api/device/door"

# トークンの設定
token = "4c716d4cf211c7b7d2f3233c941771ad0507ea5bacf93b492766aa41ae9f720d"

# 変更：ここまで

# ドアセンサーのon off設定
door_sw = True

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
