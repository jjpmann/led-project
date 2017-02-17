# test
 
from magichome import MagicHomeApi




# controller1 = MagicHomeApi('10.10.123.3', 0)

controller1 = MagicHomeApi('192.168.1.31', 0)

# print(controller1.get_status())



controller1.update_device(255, 0, 0)
#controller1.update_device(0, 255, 0)
#controller1.update_device(10, 10, 250)

#controller1.turn_on()