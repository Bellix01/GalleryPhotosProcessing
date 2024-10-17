from __future__ import print_function
from __future__ import division
import cv2
from flask import Flask, request, jsonify
from flask_cors import CORS
import numpy as np
from matplotlib import pyplot as plt
from sklearn.cluster import KMeans
import os
import json

app = Flask(__name__)
app.config['JSONIFY_PRETTYPRINT_REGULAR'] = False
app.config['DEBUG'] = True
CORS(app)
histogrammedis=[]
dominantdis=[]
momentdis=[]
maxilist= []
all_dis=[]
j=0

def preprocess_data(data):
    processed_data = [list(item) for item in data]
    return processed_data

@app.route('/queryImage', methods=['POST'])
def queryImage():
    if 'image' not in request.files:
        return jsonify({'error': 'Image not provided'}), 400
    image_file = request.files['image']
    if image_file.filename == '':
        return jsonify({'error': 'Invalid file name'}), 400
    upload_folder = 'uploads'
    os.makedirs(upload_folder, exist_ok=True)
    filepath = os.path.join(upload_folder, image_file.filename)
    image_file.save(filepath)
    print(f'Saved file: {filepath}')
    img = cv2.imread(filepath, 1)
    all_chans= histogramCalc(img)
    colors= colorDomCalc(img)
    characteristics = list(calculate_characteristics(img).values())
    with open('datastore/test.txt','r') as file:
        ids= json.load(file)
    lists= []
    for id in ids:
        minilist= []
        flag= 0
        with open('datastore/data.txt', 'r') as file:
            line_count = 0
            for line in file:
                if line_count % 4 == 0:
                    if int(line)== id:
                        hist= eval(file.readline())
                        colorDom= eval(file.readline())
                        moment= eval(file.readline())
                        flag= 1
                if(flag== 1): 
                    break
                line_count+= 1
        minilist.append(calculate_distance(calculate_histo_distance(hist,all_chans),calculate_domi_distance(colors,colorDom),calculate_moments_distance(characteristics,moment)))
        minilist.append(id)
        maxilist.append(minilist)
        sorted_data = sorted(maxilist, key=lambda x: x[0])
        first_10_lists = sorted_data[:10]
        second_values = [sublist[1] for sublist in first_10_lists]
        with open('datastore/test.txt','w') as file:
            json.dump(second_values,file)
    return jsonify({'input_features': first_10_lists})

def calculate_histo_distance(feature_vector1, feature_vector2):
    array1 = np.array(feature_vector1)
    array2 = np.array(feature_vector2)
    euclidean_distance = np.linalg.norm(array1 - array2)            
    return euclidean_distance
def calculate_moments_distance(feature_vector1, feature_vector2):
    array1 = np.array(feature_vector1)
    array2 = np.array(feature_vector2)
    euclidean_distance = np.linalg.norm(array1 - array2)
    return euclidean_distance
def calculate_domi_distance(feature_vector1, feature_vector2):
    array1 = np.array(feature_vector1)
    array2 = np.array(feature_vector2)
    euclidean_distance = np.linalg.norm(array1 - array2)
    return euclidean_distance
def calculate_distance(histogrammedis,dominantdis,momentdis,histogram_weight=1.0 , dominant_colors_weight=1.0,moments_weight=1.0):
    distance = (
        histogram_weight *histogrammedis +
        dominant_colors_weight *dominantdis  +
        moments_weight * momentdis
    )
    return distance
@app.route('/retrieveImages', methods=['POST'])
def retriveImage():
    

    for i in range(j+1):
    
        res=calculate_distance(dominantdis[i],histogrammedis[i],momentdis[i])
        all_dis.append(res)
    all_dis.sort()
    print(all_dis)




#####################################################
@app.route('/process_image', methods=['POST'])
def process_image():
    data = request.get_json()
    if 'image_path' not in data:
        return jsonify({'error': 'Image path not provided'}), 400

    image_path = data['image_path']
    # Split the 'image_path' properly and join it
    dir_path = os.path.join(os.getcwd(), 'public')
    full_path = os.path.join(dir_path, *image_path.split('/'))
    img = cv2.imread(full_path, 1)
    
    all_chans= histogramCalc(img)
    colors= colorDomCalc(img)
    characteristics = calculate_characteristics(img)
    return jsonify({'chans':all_chans, 'characteristics': characteristics, 'colors': colors})

@app.route('/store_data', methods=['POST'])
def store_data():
    data = request.get_json()
    if 'key1' not in data:
        return jsonify({'error': 'Image path not provided'}), 400
    image_url= data['key1']
    image_id= data['key2']

    dir_path =os.getcwd()
    full_path = "".join([dir_path+'/public', image_url])
    img = cv2.imread(full_path, 1)
    
    all_chans= histogramCalc(img)
    colors= colorDomCalc(img)
    characteristics = calculate_characteristics(img)
    characteristics = list(characteristics.values())

    relative_path = 'datastore/data.txt'
    file_path = os.path.join(dir_path, relative_path)
    with open(file_path,'a') as file:
        file.write(str(image_id)+'\n')
        json.dump(all_chans, file)
        file.write('\n')
        json.dump(colors, file)
        file.write('\n')
        json.dump(characteristics, file)
        file.write('\n')
    return jsonify({'succer': 'Image path not provided'}), 200

def histogramCalc(img):
    chans = cv2.split(img)
    colors = ("b", "g", "r")
    all_chans= []
    for (chan, color) in zip(chans, colors):
        hist = cv2.calcHist([chan], [0], None, [256], [0, 256])
        flat_histogram_data = [int(item) for sublist in hist for item in sublist]
        all_chans.append(flat_histogram_data)
    return all_chans

def colorDomCalc(img):
    nbreDominantColors = 6
    examples = img.reshape((img.shape[0] * img.shape[1], 3))
    kmeans = KMeans(n_clusters=nbreDominantColors)
    kmeans.fit(examples)
    colors = kmeans.cluster_centers_.astype(int)
    colors = colors.tolist()
    colors = [row[::-1] for row in colors] 
    return colors

def calculate_characteristics(sample_img):
    gray_img = cv2.cvtColor(sample_img, cv2.COLOR_BGR2GRAY)
    ret, thresh = cv2.threshold(gray_img, 127, 255, 0)
    moments = cv2.moments(thresh)
    x = int(moments["m10"] / moments["m00"]) if moments["m00"] > 0 else 0
    y = int(moments["m01"] / moments["m00"]) if moments["m00"] > 0 else 0
    cv2.circle(sample_img, (x, y), 5, (255, 255, 255), -1)
    cv2.putText(sample_img, "Centroid", (x - 25, y - 25), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 2)
    canny_edges = cv2.Canny(sample_img, 30, 200)
    contours, hierarchy = cv2.findContours(canny_edges, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_NONE)
    cv2.drawContours(sample_img, contours, -1, (0, 255, 0), 3)
    hsv_image = cv2.cvtColor(sample_img, cv2.COLOR_BGR2HSV)
    hue_mean = moments['m10'] / moments['m00'] if moments['m00'] > 0 else 0
    saturation_mean = moments['m01'] / moments['m00'] if moments['m00'] > 0 else 0
    saturation_std_dev = np.sqrt(moments['m20'] / moments['m00'] - (moments['m10'] / moments['m00'])**2) if moments['m00'] > 0 else 0
    hue_skewness = moments['mu20'] / (moments['mu02'] ** 1.5) if moments['mu02'] > 0 else 0
    characteristics = {
        "Hue mean": hue_mean,
        "Saturation mean": saturation_mean,
        "Saturation std dev": saturation_std_dev,
        "Hue skewness": hue_skewness
    }
    return characteristics
if __name__ == '__main__':
    app.run(debug=True, port=5000)
