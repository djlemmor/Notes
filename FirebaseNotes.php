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
then register app
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

const firebaseInit = () => {
    const firebaseConfig = {
        apiKey: "AIzaSyBpSwQ0Yzfq3R0o_0Ah-qdzFHZXgZ9rEho",
        authDomain: "udemy-vue-firebase-sites-ef98b.firebaseapp.com",
        projectId: "udemy-vue-firebase-sites-ef98b",
        storageBucket: "udemy-vue-firebase-sites-ef98b.appspot.com",
        messagingSenderId: "770160744436",
        appId: "1:770160744436:web:59d917142260fc29f4cba1"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    return { db }
}

export default firebaseInit

// HOW TO CREATE A COLLECTION IN FIRESTORE //
click Start Collection add Collection ID .example posts
we can create our own id but its much simplier to auto generate
then enter values on field, type and value then save

// HOW TO GET DATA FROM FIRESTORE // FROM DOJO BLOG TRAINING
import { ref } from '@vue/reactivity'
import firebaseInit from '../firebase/config'
import { collection, getDocs, orderBy, query } from 'firebase/firestore'

const getPosts = () => {
    const { db } = firebaseInit()
    const posts = ref([])
    const error = ref(null)

    const load = async() => {
        try {
            const collections = collection(db, 'posts')
            const queries = query(collections, orderBy('createdAt', 'desc'))
            const documents = await getDocs(queries)
            posts.value = documents.docs.map(doc => {
                return {...doc.data(), id: doc.id }
            })

        } catch (err) {
            error.value = err.message
            console.log(error.value)
        }
    }
    return { posts, error, load }
}

export default getPosts








































