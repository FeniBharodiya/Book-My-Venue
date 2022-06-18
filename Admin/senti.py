import pandas as pd


data = pd.read_csv("Book1.csv",encoding='utf8')
#mydata = data.drop(["Liked"], axis=1)
mydata = data.drop(['address','categories','name','reviews.date','reviews_rating'], axis=1)
# mydata.head(150)


import re
# Define a function to clean the text
def clean(text):
# Removes all special characters and numericals leaving the alphabets
    text = re.sub('[^A-Za-z]+', ' ', str(text))
    return text

# Cleaning the text in the review column
mydata['Cleaned Reviews'] = mydata['reviews_text'].apply(clean)
# mydata.head(150)

import nltk
# nltk.download('averaged_perceptron_tagger')
# nltk.download('punkt')
from nltk.tokenize import word_tokenize
from nltk import pos_tag
# nltk.download('stopwords')
from nltk.corpus import stopwords
# nltk.download('wordnet')
from nltk.corpus import wordnet

# POS tagger dictionary
pos_dict = {'J':wordnet.ADJ, 'V':wordnet.VERB, 'N':wordnet.NOUN, 'R':wordnet.ADV}
def token_stop_pos(text):
    tags = pos_tag(word_tokenize(text))
    newlist = []
    for word, tag in tags:
        if word.lower() not in set(stopwords.words('english')):newlist.append(tuple([word, pos_dict.get(tag[0])]))
    return newlist

mydata['POS tagged'] = mydata['Cleaned Reviews'].apply(token_stop_pos)
# mydata.head(150)

from nltk.stem import WordNetLemmatizer
wordnet_lemmatizer = WordNetLemmatizer()
def lemmatize(pos_data):
    lemma_rew = " "
    for word, pos in pos_data:
      if not pos:
          lemma = word
          lemma_rew = lemma_rew + " " + lemma
      else:
          lemma = wordnet_lemmatizer.lemmatize(word, pos=pos)
          lemma_rew = lemma_rew + " " + lemma
      return lemma_rew

mydata['Lemma'] = mydata['POS tagged'].apply(lemmatize)
# mydata.head(150)

from textblob import TextBlob
# function to calculate subjectivity
def getSubjectivity(review):
    return TextBlob(review).sentiment.subjectivity
    # function to calculate polarity
def getPolarity(review):
    #print(TextBlob(review).sentiment.polarity)
    return TextBlob(review).sentiment.polarity

# function to analyze the reviews
def analysis(score):
    if score < 0:
        return 'Negative'
    elif score == 0:
        return 'Neutral'
    else:
        return 'Positive'

fin_data = pd.DataFrame(mydata[['reviews_text', 'Lemma']])
# fin_data.head(150)

#fin_data['Subjectivity'] = fin_data['Lemma'].apply(getSubjectivity)
cnt=0
fin_data=fin_data.dropna()
#print(fin_data['Lemma'].isna())
fin_data['Polarity1'] = fin_data['Lemma'].apply(getPolarity) 
fin_data['Analysis'] = fin_data['Polarity1'].apply(analysis)
# fin_data.head(150)

fin_data.to_csv("senti.csv")

print("sentiment CSV file is ready")
