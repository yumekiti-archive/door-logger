import requests
import RPi.GPIO as GPIO
import json
import time

# 以下後に変更

# トークン設定
token = "e23da7f422631835387e2e47f883cee9b6fc69ea603c8e692ea22d0d0905d2f6"

# 以下URLが等しくない時変更 URL設定
url = "http://192.168.11.31:8010/api/device/door"

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

