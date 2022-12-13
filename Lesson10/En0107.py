print("これはフィボナッチ数列の第10項まで求めるプログラムです。\n")
a_0, a_n=0, 1
count=1
while count<11:
    #count(項数)が10になるまで繰り返し処理を行う
    print(f"第{count}項:{a_n}\n")
    a_0, a_n=a_n, a_0+a_n
    count+=1