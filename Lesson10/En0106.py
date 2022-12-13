import random
import math
FirstRideFee=710
FirstRideDistance=1500
#初乗り1500mまで710円のため、それの宣言
FeeUp=90
FeeUpDistance=283
#初乗り料金後、283m毎に90円上がるため、それの宣言

print("これは初乗り1500mまで710円、以降283m毎に90円ずつ増加し、\n")
print("夜間料金は昼間料金よりも3割増しで、10円未満は切り捨てられるプログラムです。\n\n")

for Distance in range(1000, 10500, 500):
    #1000mから10000mまで500m区切りで繰り返し処理を行う
    #range(1000, 10000, 500)だと10000mが表示されないので10500にした
    if Distance<=FirstRideDistance:
        Fee=FirstRideFee
        NightFee=round(FirstRideFee*1.3, -1)
        #距離が1500m以内の場合は昼間料金は1500円、夜間は昼間の1.3かけたもの
        print(f"移動距離:{Distance}m\n")
        print(f"昼間料金:{Fee}円\n")
        print(f"夜間料金:{NightFee:.0f}円\n")
    else:
        Times=math.ceil((Distance-FirstRideDistance)/FeeUpDistance)
        Fee=FirstRideFee+Times*FeeUp
        NightFee=round((FirstRideFee+Times*FeeUp)*1.3, -1)
        print(f"移動距離:{Distance}m\n")
        print(f"昼間料金:{Fee}円\n")
        print(f"夜間料金:{NightFee:.0f}円\n")
    print("----------------")