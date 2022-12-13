import numpy
import random

# サイコロを振る回数を指定する
num_rolls = 300

# サイコロを振る関数を定義する
def roll_dice():
  return random.randint(1, 7)

# サイコロを振って出た目の和を格納する配列を用意する
roll_sums = []

# サイコロを振る
for i in range(num_rolls):
  # 2つのサイコロを振り、出た目の和を計算する
  roll1 = roll_dice()
  roll2 = roll_dice()
  roll_sum = roll1 + roll2
  roll_sums.append(roll_sum)

# 平均値を計算する
mean = numpy.mean(roll_sums)
print("平均値:", mean)

# 標準偏差を計算する
stddev = numpy.std(roll_sums)
print("標準偏差:", stddev)

# 度数分布を計算する
hist, bins = numpy.histogram(roll_sums)
print("度数分布:", hist)
for h in hist:
    print(h)