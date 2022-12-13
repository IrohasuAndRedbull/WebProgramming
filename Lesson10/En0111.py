import numpy as np

#サイコロを300回投げた結果をsaikoroに代入する
Times=300
Dice01 = np.random.randint(1,7,Times)
Dice02 = np.random.randint(1,7,Times)
Total = Dice01+Dice02
Totals=[]
Totals.append(Total)
Count=2.0

#平均と標準偏差を求める
Average = np.mean(Total)
StandardDeviation = np.std(Total)
print(f"試行回数:{Times}\n")
print(f"平均:{Average:.3f}, 標準偏差={StandardDeviation:.3f}")
# 度数分布を計算する
hist, bins = np.histogram(Totals)
print("度数分布:")
for h in hist:
    print(f"{Count}～{Count+1.0}\t{h}")
    Count+=1.0
