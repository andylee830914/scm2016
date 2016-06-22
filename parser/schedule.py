import csv
import sys
keyword={"開幕","茶點","台南小吃","報到","討論時間","午餐","大東夜市","晚宴","TBD"}
inputs=sys.argv[1]
f=open(inputs,"r")
reader = csv.reader(f)
i=0;
for j in range(4):
    print("day{}".format(j+1))
    f.seek(0)
    row1 = next(reader)
    for row in reader:
        if row[1+j]:
            if row[1+j] in keyword:
                s='{"time":"'+row[0]+'","content":"'+row[1+j]+'","place":"3173","talkid":0},'
            else:
                i=i+1
                s='{"time":"'+row[0]+'","content":"'+row[1+j]+'","place":"3173","talkid":"t'+str(i)+'"},'
            print(s)
print("\nPlease remember to remove the last comma of every day to satisfy json format\n")
