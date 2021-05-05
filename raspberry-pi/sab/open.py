import requests
import json
import time
import sys

# 以下後に変更

# トークン設定
print("トークンを設定")
token = "4c716d4cf211c7b7d2f3233c941771ad0507ea5bacf93b492766aa41ae9f720d"

print("IPとポートを指定")
ip = "localhost:8081"

# 以下URLが等しくない時変更 URL設定
url = "https://" + ip + "/api/device/door"

# 変更内容ここまで

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token, "Accept" : "application/json", 'Content-Type': 'application/json'}

# ドアセンサーのon off設定
door_sw = True

# on off 確認
print(door_sw)

# パラメーター設定
params = { "is_open": door_sw }

# paramsをjsonに変更
door_json = json.dumps(params)

# サーバーへPOST
res = requests.post(url, door_json, headers=headers, verify = False)

# 終わり確認
print("end")
