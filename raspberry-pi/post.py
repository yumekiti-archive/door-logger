import requests
import time
import RPi.GPIO as GPIO

# 以下後に変更

# URLの設定
url = "hoge"

# トークンの設定
token = "hoge"

# ここまで

# ヘッダーの設定
headers = {"Authorization" : "Bearer "+ token}

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

        print(door_sw)
        time.sleep(0.03)

        #ドアセンサーとpostループ対策が等しくない時
        if door_sw == sw_lock:
            continue

        # postループ対策
        sw_lock = door_sw

        # センサーの値が変化した時その状態をサーバーへPOSTする
        params = { "data": { "is_open": door_sw == False } }
        res = requests.post(url, params)

    except:
        break

# GPIO操作終了
GPIO.cleanup()

# 終わり
print("end")