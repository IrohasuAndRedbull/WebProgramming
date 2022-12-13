import random
import math
FirstRideFee=710
FirstRideDistance=1500
FeeUp=90
FeeUpDistance=283
Distance=random.randrange(2000,5000,100)
Times=math.ceil((Distance-FirstRideDistance)/FeeUpDistance)

Fee=FirstRideFee+Times*FeeUp
NightFee=round((FirstRideFee+Times*FeeUp)*1.3, -1)

print("これは初乗り1500mまで710円、以降283m毎に90円ずつ増加し、\n")
print("夜間料金は昼間料金よりも3割増しで、10円未満は切り捨てられるプログラムです。\n\n")

print(f"移動距離:{Distance}m\n")
print(f"昼間料金:{Fee}円\n")
print(f"夜間料金:{NightFee:.0f}円\n")