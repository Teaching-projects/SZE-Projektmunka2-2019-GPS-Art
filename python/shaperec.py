import numpy as np
import cv2
import json
import sys

shape='n/a'

imgPath="C:\\xampp\\htdocs\\projektmunka\\python\\haromszog.png"
img = cv2.imread(imgPath)
kernel=np.ones((1,1),np.uint8)
img=cv2.erode(img,kernel,iterations=1)
img= cv2.bitwise_not(img)
imgGrey = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
_, thresh = cv2.threshold(imgGrey, 240, 255, cv2.THRESH_BINARY)
contours, _ = cv2.findContours(thresh, cv2.RETR_TREE, cv2.CHAIN_APPROX_NONE)

for contour in contours:
    approx = cv2.approxPolyDP(contour, 0.01* cv2.arcLength(contour, True), True)
    cv2.drawContours(img, [approx], 0, (0, 0, 0), 5)
    x = approx.ravel()[0]
    y = approx.ravel()[1] - 5
    if len(approx) == 3:
        shape="Triangle"
    elif len(approx) == 4:
        x1 ,y1, w, h = cv2.boundingRect(approx)
        aspectRatio = float(w)/h
        if aspectRatio >= 0.95 and aspectRatio <= 1.05:
            shape="Square"
        else:
            shape="Rectangle"
    elif len(approx) == 5:
        shape="Pentagon"
    elif len(approx) == 6:
        shape="Hexagon"
    elif len(approx) == 7:
        shape="Optagon"
    elif len(approx) == 8:
        shape="Octagon"
    elif len(approx) == 10:
        shape="Star"
    else:
        shape="Circle"
print(shape)
