import time
import RPi.GPIO as GPIO
 
GPIO.setmode(GPIO.BCM)
 
#GPIO18pinを入力モードとし、pull up設定とします 
GPIO.setup(18,GPIO.IN,pull_up_down=GPIO.PUD_UP)
 
sw_status = True
sw_lock = False
 
while True:
    try:
        sw_status = GPIO.input(18)
        if sw_status == True and sw_lock == False:
            sw_lock = True
            print("open")
        elif sw_status == False and sw_lock == True:
            sw_lock = False
            print("close")

        time.sleep(0.03)
    except:
        break
 
GPIO.cleanup()
print("end")
