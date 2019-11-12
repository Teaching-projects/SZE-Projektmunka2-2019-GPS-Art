import numpy as np
import cv2
import sys

def findDiff(originalPic, drawnPic):
    origP=cv2.imread('originalPic',0)
    drawnP=cv2.imread('drawnPic',0)
    ret, thresh = cv2.threshold(origP, 127, 255,0)
    ret, thresh2 = cv2.threshold(drawnP, 127, 255,0)
    contours,hierarchy = cv2.findContours(thresh,2,1)
    cnt1 = contours[0]
    contours,hierarchy = cv2.findContours(thresh2,2,1)
    cnt2 = contours[0]
    ret = cv2.matchShapes(cnt1,cnt2,1,0.0)
    print( ret )
    return ret
