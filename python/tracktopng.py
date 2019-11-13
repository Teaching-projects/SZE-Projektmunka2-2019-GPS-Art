import sys
import matplotlib.pyplot as plt
import xml.etree.ElementTree as ET

ns = '{http://www.topografix.com/GPX/1/1}'
for trkseg in ET.parse(sys.argv[1]).getroot().iter(ns+"trkseg"):
    plt.axis('off')
    plt.plot(list(float(trkpt.attrib['lat'])*1.02 for trkpt in trkseg), list(float(trkpt.attrib['lon'])*2 for trkpt in trkseg), linewidth=3, c='black')
plt.savefig(sys.argv[2], bbox_inches='tight', dpi=100)
