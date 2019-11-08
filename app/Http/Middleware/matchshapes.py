import numpy as np
import cv2
import sys
import glob

def loadAllPics(folderName):
    filenames=glob.glob(folderName+"*.png")
    filenames.sort()
    pictures=[cv2.imread(img) for img in filenames]
    for img in pictures:
        cv2.imshow("shapes", img)
        cv2.waitKey(0)
        cv2.destroyAllWindows()

