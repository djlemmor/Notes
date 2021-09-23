// VUE 3 NOTES //
/*

first install nodejs so we can use node package manager or npm to install vue cli
type node -v on cmd or any command line to check if we installed nodejs properly
npm install -g @vue/cli //command to instal vue cli// npm is the nodejs we install // -g means install the package globally
change folder or directory to where we gonna create our project using cd command in the command line //example cd .. or cd Documents
vue create project-name // command to create the project // vue is the command from vue cli package we installed 

#START OF VUE CREATE POTIONS
select manually select features choose Typescript, Router, Vuex 
version 3
use class-style component syntax? No
Use Babel alongside Typescript? Yes
Use history mode for routers? Yes
Eslint with error prevention only
Lint on save
In dedicated config files
#END OF VUE CREATE OPTIONS

cd project-name #change directory to the project folder
code . #open your favorite text editor
npm run serve #serve or run the application to the browser 

#START OF VUE FILE AND DIRECTORY STRUCTURE
node_modules # the folder for libraries and dependencies
public # the public folder to be uploaded in the serve
public > index.html # this is where we mount our app.vue #mount means attaching our displaying our application
src # is the folder where we write our code
src > assets folder # 
src > components folder # 
src > App.vue file # the root component, #Vue files structure is <template></template> <script></script> <style></style>
src > main.js file # inside is the code that starts our application, createapp and mount method, here we import the App.vue then mount it on the #app. id app is inside index.html from public folder 
.gitignore # the files to ignore or not to push on github when we upload our application to github
package.json # where we can see our project dependencies 
#END OF VUE FILE AND DIRECTORY STRUCTURE

install vetur extension for vue

<template></template> is a vue tag

<template>
    <h1> {{ title }} </h1> # double curly braces to output data from script
</template>

<script>

export default {
  name: 'App', # name of the vue component
  data() { # data method
    return { # data method returns an object
      title: "Hi Vue", # declaring a variable or data
    }
  },
}
</script>

<style> </style> # for css styling  
<style scoped> # for styling but limit the scoped within the components and not affect another component

typing vue and pressing tab creates a boiler plate because of vetur extension

npm install # terminal command to install the project dependencies







*/