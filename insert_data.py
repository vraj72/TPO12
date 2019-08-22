import mysql.connector as con
mycon=con.connect(host="localhost",user="viraj",passwd="qwerty",database="dbit2")
mycur=mycon.cursor()

import pandas as pd
import numpy as np
dataset = pd.read_csv('placement2014.csv')
print(dataset)
#print(dataset.iloc[1])
d=np.array(dataset)
print(d[0])
print(d)
# a='Electronics and Telecommunications'
# print(len(a))
print(d.size)

for i in range(0,d.size):
	val=[]	
	val.append(d[i][0])
	val.append(d[i][1])
	val.append(d[i][2])
	val.append('2014')
	print("values im going to insert ************",str(val))
	sql="INSERT INTO placed_info VALUES(%s,%s,%s,%s)"
	mycur.execute(sql,val)
	mycon.commit()
	print("Commited")