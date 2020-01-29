import cv2
import sys
import json
import numpy as np
from matplotlib import pyplot as plt

shape='n/aaaa'
imgPath="C:\\xampp\\htdocs\\projektmunka\\python\\haromszog.png"
#imgPath=sys.argv[1]
img = cv2.imread(imgPath, cv2.IMREAD_GRAYSCALE)
_, threshold = cv2.threshold(img, 240, 255, cv2.THRESH_BINARY)
contours, _ = cv2.findContours(threshold, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)

for cnt in contours:
    approx = cv2.approxPolyDP(cnt, 0.01*cv2.arcLength(cnt, True), True)
    cv2.drawContours(img, [approx], 0, (0), 5)
    x = approx.ravel()[0]
    y = approx.ravel()[1]
    if len(approx) == 3:
        shape="triangle"
    elif len(approx) == 4:
        shape="square"
    elif len(approx) == 5:
        shape="otszog"
    elif 6 < len(approx) < 15:
        shape="sokszog"
    else:
       shape="circle"
print(shape)
