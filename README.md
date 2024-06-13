### Criminal Tracking Live System

© 2024 kirancreed. All rights reserved.

This repository contains the Criminal Tracking Live System project.

Unauthorized copying of this file, via any medium, is strictly prohibited.

## Instructions

### Setting Up the Web Application (PHP)

1. Move the `crime` folder to the `htdocs` directory in XAMPP.
   
### Setting Up the Python Code

1. Create a new folder for the Python code outside of `htdocs`.
2. Move the Python code files into this new folder.

### Installing Dependencies

1. Open Anaconda Prompt.
2. Navigate to the folder `crime python code` containing the Python code using the `cd` command.
3. Make sure you keep the `crime python code` separately don't keep that in xampp.
4. Install the required dependencies by running  `requirements.txt`

## Abstract

The rising crime rates and increasing number of criminals have heightened security concerns worldwide. Limited availability of police personnel poses challenges for effective crime prevention and identification. CCTV cameras play a crucial role in surveillance and crime detection, providing valuable visual data.

To address these challenges, this project implements a real-time facial recognition system utilizing advanced algorithms. The system leverages Haar feature-based cascade classifiers and OpenCV's LBPH (Local Binary Pattern Histograms) algorithms for face detection, ensuring accuracy and reliability in identifying individuals.

Challenges persist in accurately locating faces within surveillance footage. Common frameworks like OpenCV facilitate robust face detection capabilities, while the implementation of Convolutional Neural Networks (CNNs) further enhances accuracy.

Key features of the system include:
- Real-time identification of individuals using facial features.
- Automated tagging of individuals to streamline image sharing and identification processes.
- Utilization of CNN algorithms to improve face detection precision.

The goal of this project is to develop a robust system that enables law enforcement agencies to efficiently recognize criminals based on facial features. The implemented face recognition method is designed to be fast, reliable, and accurate, utilizing straightforward algorithms for practical implementation.

## Dataset Source

The dataset used in this project is sourced from the `face_recognition` library repository .

### Repository Link

For more information about the dataset and its usage, please refer to:
[face_recognition GitHub repository](https://github.com/ageitgey/face_recognition)

This dataset is integral to the face recognition capabilities implemented in the Criminal Tracking Live System, leveraging pre-trained models provided by the `face_recognition` library.

## Modules

### Admin Module

Register police stations: This includes adding new stations and managing their information within the system.
Manage crimes and cases: This encompasses creating new crime and case entries, assigning them to officers, tracking their progress, and reviewing case details and complaints.
Search people: Administrators can conduct authorized searches on individuals within the system, likely for investigative purposes.
Manage notifications and messages: This includes sending system-generated alerts, viewing existing notifications, and replying to messages sent through the platform.
Verify warnings: Administrators can access and confirm the validity of warnings issued within the system. 

<img src="images/111.png" alt="Admin Module Screenshot" width="600" height="400">

### People Module

Has the right to submit complaints to the relevant police station.
Can view notifications regarding their submitted complaints or inquiries.
Can respond to messages received through official communication channels.
Can edit their profile information within the designated system. 

### Police Module

Police have the authority to conduct searches within a police station.
They can register cases based on reported crimes and conduct investigations to verify the details.
They receive and review notifications from the admin.
They can send responses to messages received.
They have access to a system for viewing registered complaints filed by the public.

### Image Segmentation Module

This is the main step. Various facial features are extracted. The grayscale images from this step are used to identify the criminal.

### Criminal Identification Module

The extracted images are identified for faces using dlib library and deep learning algorithm. So the person's face alone is captured without any interruption of the background.

### Database Module

It is a tool for collecting and organizing information. Databases and datasets can store information about people, crime, law, or cases. Many pictures of criminals along with their identities are stored in the database and dataset.

### Image Matching Module

The resulting images are compared with existing images in the dataset. If a match is found, data related to that image is returned from the dataset, otherwise the recognized person is not a criminal.

### Alert Module

If a criminal is detected, an alert message is sent to the person along with the captured images and details of the criminals using this application.

