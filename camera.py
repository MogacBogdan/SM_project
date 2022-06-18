import picamera
from time import sleep
camera = picamera.PiCamera()

camera.capture('/var/www/html/image.jpg')
