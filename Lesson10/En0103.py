import math
r=5
CentralAngle=75/180*math.pi

c=2*r*math.sin(CentralAngle/2)
L=r*CentralAngle

print(f"半径が{r}, 中心角が75°,すなわち{CentralAngle}のとき、\n弧の長さは{L:.3f}\n弦の長さは{c:.3f}")