import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)

GPIO.setup(12,GPIO.OUT)
servo1 = GPIO.PWM(12,50)

servo1.start(8)
time.sleep(1)

duty = 8
while duty >=3:
        servo1.ChangeDutyCycle(duty)
        time.sleep(1)
        duty = duty-1

time.sleep(1)
servo1.ChangeDutyCycle(3)
time.sleep(1)
servo1.ChangeDutyCycle(9)
