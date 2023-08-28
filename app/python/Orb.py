import sys
import cv2
import numpy as np

def calculate_accuracy(matches, ground_truth):
    correct_matches = 0

    for match in matches:
        if match.distance < ground_truth:
            correct_matches += 1

    accuracy = (correct_matches / len(matches)) * 100 
   
    return accuracy

def detect_and_match_features(image1, image2, ground_truth_distance):
    # Load images
    img1 = cv2.imread(image1, cv2.IMREAD_GRAYSCALE)
    img2 = cv2.imread(image2, cv2.IMREAD_GRAYSCALE)

    # Initialize ORB
    orb = cv2.ORB_create()

    # Find keypoints and descriptors
    keypoints1, descriptors1 = orb.detectAndCompute(img1, None)
    keypoints2, descriptors2 = orb.detectAndCompute(img2, None)

    # Create a Brute-Force matcher
    bf = cv2.BFMatcher(cv2.NORM_HAMMING, crossCheck=True)

    # Match keypoints
    matches = bf.match(descriptors1, descriptors2)

    # Sort matches by distance
    matches = sorted(matches, key=lambda x: x.distance)

    # Calculate accuracy
    accuracy = calculate_accuracy(matches, ground_truth_distance)
    
    #print("Accuracy: {:.2f}% ".format(accuracy))
    print(accuracy)
   

# Example usage
image1_path = sys.argv[1]
image2_path = sys.argv[2]
image_1 = str(image1_path[2:-2])
image_2 = str(image2_path[2:-2])
ground_truth_distance = 40  # Set the ground truth distance her

detect_and_match_features(image_1, image_2, ground_truth_distance)

