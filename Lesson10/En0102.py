import math
LengthA=5
LengthB=6
LengthC=8
S=(LengthA+LengthB+LengthC)/2

Area = math.sqrt(S*(S-LengthA)*(S-LengthB)*(S-LengthC))

print(f"三辺の長さが{LengthA}, {LengthB}, {LengthC}の時の面積は{Area:.3f}")