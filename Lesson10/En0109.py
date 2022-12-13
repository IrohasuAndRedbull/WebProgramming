import numpy as np

#数学と英語で0～100点で各15回ずつ点数を決める
Math=np.random.randint(0, 101, 15)
English=np.random.randint(0, 101, 15)
print("数学と英語のそれぞれの点数は\n")
print(f"{Math}点,\n{English}点")

#合計点
TotalScore=Math+English
#2科目の平均点
AverageOfTotalScore=np.mean(TotalScore)
#2科目の標準偏差
StandardDeviationOfTotalScore=np.std(TotalScore)
#2科目での偏差値
StandardValueOfTotalScore=50+10*(TotalScore-AverageOfTotalScore)/StandardDeviationOfTotalScore

print("各個人の合計点と偏差値はそれぞれ\n")
print(f"{TotalScore}点,\n{StandardValueOfTotalScore}")
#出力