import numpy as np

print("これはさいころを3個投げ、出た目の和について平均値と標準偏差を求めるプログラムです。\n")

for i in range(100, 1001, 100):
    Dice01 = np.random.randint(1,7,i)
    Dice02 = np.random.randint(1,7,i)
    Dice03 = np.random.randint(1,7,i)
    Total=Dice01+Dice02+Dice03
    Average = np.mean(Total)
    StandardDeviation = np.std(Total)
    print(f"試行回数{i}回において、さいころ3個を投げた時の")
    print(f"出た目の和の平均値:{Average}")
    print(f"標準偏差:{StandardDeviation}")
    print("-----------------------------------------------")