import sys
import matplotlib.pyplot as plt
import xml.etree.ElementTree as ET

root = ET.parse(sys.argv[1]).getroot()
ns = '{http://www.topografix.com/GPX/1/1}'

def trkseg_to_png(track):
    plt.axis('off')
    plt.plot(list(elem['lat'] for elem in track), list(elem['lon'] for elem in track), linewidth=3, c='black')

for trkseg in root.iter(ns+"trkseg"):
    track = []
    for trkpt in trkseg:
        track.append({
            'lat': float(trkpt.attrib['lat']), 
            'lon': float(trkpt.attrib['lon'])
        })
    trkseg_to_png(track)
plt.savefig(sys.argv[2], bbox_inches='tight', dpi=100)
