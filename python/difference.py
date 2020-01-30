import numpy as np
import cv2
import sys

#img1= cv2.imread("C:\\xampp\\htdocs\\projektmunka\\python\\53szog.png", cv2.IMREAD_UNCHANGED)
#img2 = cv2.imread("C:\\xampp\\htdocs\\projektmunka\\python\\real.png", cv2.IMREAD_UNCHANGED)
img1= cv2.imread(sys.argv[1], cv2.IMREAD_UNCHANGED)
img2 = cv2.imread(sys.argv[2], cv2.IMREAD_UNCHANGED)

alpha_channel = img1[:, :, 3]
_, mask = cv2.threshold(alpha_channel, 254, 255, cv2.THRESH_BINARY)  # binarize mask
color = img1[:, :, :3]
new_img = cv2.bitwise_not(cv2.bitwise_not(color, mask=mask))
new_img=cv2.cvtColor(new_img, cv2.COLOR_BGR2GRAY);


new_img2=cv2.cvtColor(img2, cv2.COLOR_BGR2GRAY);

ret, thresh = cv2.threshold(new_img, 127, 255,0)
ret, thresh2 = cv2.threshold(img2, 127, 255,0)

contours,hierarchy = cv2.findContours(new_img,2,1)
cnt1 = contours[0]
contours,hierarchy = cv2.findContours(new_img2,2,1)
cnt2 = contours[0]
ret= cv2.matchShapes(cnt1,cnt2,1,0.0)
print( ret )
