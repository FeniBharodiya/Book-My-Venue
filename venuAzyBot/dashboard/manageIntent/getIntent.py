import nltk
from nltk.stem import WordNetLemmatizer
lemmatizer = WordNetLemmatizer()
import json
import pickle
import string

import numpy as np
from keras.models import Sequential
from keras.layers import Dense, Activation, Dropout
#from keras.optimizers import SGD
from tensorflow.keras.optimizers import SGD
import random

documents = []
words = []

data_file = open('../../dataflair/intents.json').read()
intents = json.loads(data_file)

for i in intents:
    for j in i['tag']:
        documents.append(( i['tag']))
print(documents)