import math
import random
LengthA=random.randint(3,10)
LengthB=random.randint(3,10)
LengthC=random.randint(3,10)
#乱数によって3～10の値を決める

if LengthA+LengthB<=LengthC or LengthA+LengthC<=LengthB or LengthC+LengthB<=LengthA:
    #三角形が存在しない
    print(f"三辺の長さが{LengthA}, {LengthB}, {LengthC}なので、三角形はできません\n")
else:
    #三角形が存在する→ヘロンの公式を使用する
    S=(LengthA+LengthB+LengthC)/2
    Area = math.sqrt(S*(S-LengthA)*(S-LengthB)*(S-LengthC))
    print(f"三辺の長さが{LengthA}, {LengthB}, {LengthC}の時の面積は{Area:.3f}\n")