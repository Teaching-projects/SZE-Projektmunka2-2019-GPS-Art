import numpy as np
import cv2
import json
import sys

shape='n/a'

#imgPath="C:\\xampp\\htdocs\\projektmunka\\python\\haromszog.png"
imgPath=sys.argv[1]
img = cv2.imread(imgPath, -1)
alpha = img[:,:,3]
img = ~alpha

kernel=np.ones((1,1),np.uint8)
img = cv2.GaussianBlur(img,(5,5),0)
img=cv2.erode(img,kernel,iterations=1)
thresh = 100
ret,thresh_img = cv2.threshold(img, thresh, 255, cv2.THRESH_BINARY)
_,contours, hierarchy = cv2.findContours(thresh_img, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)

img_contours = np.zeros(img.shape)
img=cv2.drawContours(img_contours, contours, -1, (0,255,0), 3)

for contour in contours:
    approx = cv2.approxPolyDP(contour, 0.01* cv2.arcLength(contour, True), True)
    cv2.drawContours(img, [approx], 0, (0, 0, 0), 5)
    x = approx.ravel()[0]
    y = approx.ravel()[1] - 5
    if len(approx) == 3:
        shape="triangle"
    elif len(approx) == 4:
        x1 ,y1, w, h = cv2.boundingRect(approx)
        aspectRatio = float(w)/h
        if aspectRatio >= 0.95 and aspectRatio <= 1.05:
            shape="square"
        else:
            shape="rectangle"
    elif len(approx) >= 5 and len(approx)<=8:
        shape="star"
    else:
        shape="circle"
print(shape)

