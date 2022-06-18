from pdf2image import convert_from_path
import easyocr
import numpy as np 
import PIL
from PIL import ImageDraw
import spacy

reader = easyocr.Reader(['en'])

images = convert_from_path('form1.pdf')

from IPython.display import display, Image 
display(Images[0])