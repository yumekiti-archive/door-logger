import requests
import RPi.GPIO as GPIO
import json
import time
import sys

# 以下後に変更

# トークン設定
print("トークンを設定")
token = input()

print("IPとポートを指定")
ip = input()

# 以下URLが等しくない時変更 URL設定
url = "http://" + ip + "/api/device/door"

# 変更内容ここまで

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token, "Accept" : "application/json", 'Content-Type': 'application/json'}

# モードの指定をする(今回は役割ピン番号)
GPIO.setmode(GPIO.BCM)
# GPIO18pinを入力モードとし、pull up設定とします
GPIO.setup(18,GPIO.IN,pull_up_down=GPIO.PUD_UP)

# ドアセンサーのon off設定
door_sw = False

# postループ対策
sw_lock = False

while True:
    try:

        # センサーの読み込み
        door_sw = GPIO.input(18)

        if door_sw != sw_lock:

            # on off 確認
            print(door_sw)

            # パラメーター設定
            params = { "is_open": door_sw }

            # paramsをjsonに変更
            door_json = json.dumps(params)

            # サーバーへPOST
            res = requests.post(url, door_json, headers=headers)

        sw_lock = door_sw

        time.sleep(0.50)

    except:
        import traceback
        traceback.print_exc()
        break

# GPIO操作終了
GPIO.cleanup()

# 終わり確認
print("end")
