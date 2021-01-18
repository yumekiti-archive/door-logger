import requests
import json

# 以下後に変更

# URLの設定
url = "http://localhost:8010/api/device/door"

# トークンの設定
token = "7dfb8b3cd7f4631a7749b1cb236fd088e3bd1b7d0e4390e21700f08d1cf5821a"

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
