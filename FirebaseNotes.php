<?php

// HOW TO CREATE A PROJECT IN FIREBASE //
go to https://firebase.google.com/
signup using google account
click go to console or https://console.firebase.google.com/u/0/
click add project then give it a name the continue
then create project, click continue
click Firestore Database
then create database
choose start in production mode for live / start in test mode for test then next 
default location click enable

// HOW TO MAKE OUR FRONT END TO COMMUNICATE WITH FIREBASE OUR BACKEND //
first install firebase package in your project in vscode
#make sure you are in the right directory of your project
npm install firebase 
when done go to package.json and see firebase in dependencies
then go to firebase and click project overview
and click </> Web in the page to register our web app
give it an app name
check also setup firebase hosting
then register app
click next
click next
continue to console
find the app in the upper part of the website
then pick the web app you just created and click settings icon
scroll down SDK setup and configuration and choose config and copy the configuration
go back to the vscode project and create a folder firebase in src
then inside firebase folder create a config.js file
paste the configuration that we copied

the config.js should look like this 

import { initializeApp } from 'firebase/app';
import { getFirestore } from 'firebase/firestore';
import { getAuth } from "firebase/auth";

const firebaseConfig = {
    apiKey: "AIzaSyBpSwQ0Yzfq3R0o_0Ah-qdzFHZXgZ9rEho",
    authDomain: "udemy-vue-firebase-sites-ef98b.firebaseapp.com",
    projectId: "udemy-vue-firebase-sites-ef98b",
    storageBucket: "udemy-vue-firebase-sites-ef98b.appspot.com",
    messagingSenderId: "770160744436",
    appId: "1:770160744436:web:7a8d6bd2570291c1f4cba1"
}

const firebaseApp = initializeApp(firebaseConfig);
const firestoreDB = getFirestore(firebaseApp);
const firebaseAuth = getAuth();

export { firebaseApp, firestoreDB, firebaseAuth }

// HOW TO CREATE A COLLECTION IN FIRESTORE //
click Start Collection add Collection ID .example posts
we can create our own id but its much simplier to auto generate
then enter values on field, type and value then save

// HOW TO DEPLOY YOUR VUE WEBSITE TO FIREBASE //
go to firebase and click hosting then click get started
and copy npm install -g firebase-tools then run it in the terminal
note in every computer you can just run it once because it is installed globally -g
then next
Sign in to Google
firebase login // paste it on the terminal
Initiate your project
firebase init // paste it on the terminal
then next
select Hosting: Configure files for Firebase Hosting 
Use an existing project and select the firebase app
What do you want to use as your public directory? dist
Configure as a single-page app (rewrite all urls to /index.html)? (y/N) y
Set up automatic builds and deploys with GitHub? (y/N) n // no for github
then next
but before we deploy we need to build our vue app
npm run build // on terminal
after that 
type firebase deploy on terminal
Deploy complete!
go to firebase hosting to see the website url

// HOW TO UPDATE THE DEPLOYED FIREBASE WEBSITE //
npm run build //in the terminal
firebase deploy //in the terminal
Deploy complete!


// FIRESTORE RULES //
create a firestore.rules file in the parent directory
and copy the cloud firestore rules from firebase google.com and paste in on the file firestore.rules
for syntaxa highligting install firebase extension in vscode
make sure rules version is up to date, version 2 for now

looks like this
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read, write: if
          request.time < timestamp.date(2021, 10, 30);
    }
  }
}


// HOW TO DEPLOY A SPECIFIC FILE IN FIRESTORE //
firebase deploy --only firestore:rules
if error add this to firebase.json
"firestore": {
    "rules": "firestore.rules",
    "indexes": "firestore.indexes.json"
},



// HOW TO ONLY ALLOW AUTHENTICATED USERS IN FIREBASE //
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /messages/{messageId} {
      allow read, write: if request.auth != null;
    }
  }
}


// HOW TO LOCK FIRESTORE TO YOUR APP OR DOMAIN //
// CONSOLE DEVELOPER //
https://console.cloud.google.com/apis/dashboard?pli=1
then select the app you are working on
then credentials and look for browser key or api key
IN Application restrictions choose HTTP referrers (web sites)
then new item pase your website url


// HOW TO ENABLE AUTHENTICATION IN FIREBASE // 
click authentication in the sidebar 
and select sign in providers, here we select email/password
then enable and save


// HOW TO ENABLE STOREAGE IN FIREBASE //
click storage in the sidebar


// HOW TO INITIALIZE PROJECT FOR FIREBASE //  
type firebase init in the terminal
then select the features we want to for our project
select existing projects with the one we created at firebase
What file should be used for Firestore Rules? (firestore.rules) press enter for default
What file should be used for Firestore indexes? (firestore.indexes.json) press enter for default
? What do you want to use as your public directory? type dist
? Configure as a single-page app (rewrite all urls to /index.html)? type yes
? Set up automatic builds and deploys with GitHub?  type no
? What file should be used for Storage Rules? press enter for default































