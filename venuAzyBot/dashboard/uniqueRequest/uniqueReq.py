# Python program to read
# json file
import nltk
import json
from nltk.tokenize import word_tokenize
import pandas as pd 
import numpy as np
from collections import Counter
from collections import defaultdict

# Opening JSON file
f = open('../../pyconnectphp/request.json')

# returns JSON object as
# a dictionary
data = json.load(f)

words = []
documents = []
# Iterating through the json
# list
for i in data['intents']:  
    documents.append(i['request'])

	
df = pd.DataFrame(documents) 
print(documents)

my_temp = defaultdict(int)

for sub in documents:
   for word in sub.split():
      my_temp[word] += 1

result = max(my_temp, key=my_temp.get)

print("The word that has the maximum frequency :")
print(result)

f.close()
