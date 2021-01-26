import requests
import json

# 以下後に変更

# URLの設定
url = "http://localhost:8010/api/device/door"

# トークンの設定
token = "f1ca24f51687e398702bf9123229895d56477e35ceadbe8395d410cf810ed7c5"

# 変更：ここまで

# ドアセンサーのon off設定
door_sw = True

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token, "Accept" : "application/json", 'Content-Type': 'application/json'}

# サーバーへPOSTする
params = { "is_open": True }
json = json.dumps(params)

res = requests.post(url, json, headers=headers)
print(res)
print(res.json())
# 終わり
print("end")
