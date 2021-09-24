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

# to push or update the github repo from local
git add . # add the files to be push
git commit -m "message" # -m means message, message or description of the update to be commited
git push origin main # origin is the url or the repo to be push and main is where is the file coming from to be push or updated

#START OF REFS
ref is equevalent of getting the id or class in javascript like using queryselector
const ref = document.querySelector("#ref"); 
<input type="text" ref="name" > # input field on template
this.$refs.name # to get the reference from script tag
#END OF REFS

#COMPONENT TREE
App.vue is the root component or the parent component
header.vue # child component of App.vue
main.vue # child component of App.vue
footer.vue # child component of App.vue
<header> # parent component of nav
<nav></nav> # child component of header
<header>
#END OF COMPONENT TREE

v-on:click ="";
@click ="";

<template>
  <div class="modal" v-show="toggle">
      <h1>content</h1>
  </div>
  <button @click="toggle = !toggle">Click Me</button> # toggle = !toggle to toggle something with its not equal value
  <button @click="toggleModal>Click Me</button> # click calls the function toggleModal
</template>

<script>
export default {
    data() {
        return {
            toggle: false
        }
    },
    methods: { # this is where we define or create our functions or methods 
        toggleModal() {
            this.toggle = true
        }
    },
}
</script>

# how to import components to other components
import Modal from './components/Modal.vue'; # example the Modal component
components: { # inside export default object
    Modal, #register the component to the component where we want the component to be used
 },
 <Modal /> # anywhere inside template. to where we are gonna output our component

#apply global css
create a global.css or stylesheet in the assets folder then in the main.js file import the css
import './assets/global.css'

#PROPS - passing data from parent component to child component
<template>
    <h1> {{ title }} </h1>
    <Modal 
        content="Im a prop" #passing a props called content on parent component
        :secondcontent="secondcontent" #binding the props value to a data so it can be dynamic
                                       # :colon then the name of attribute is how we bind data to it                     
    /> 
</template>

#PARENT COMPONENT
<script>
import Modal from './components/Modal.vue';

export default {
  name: 'App',
  components: {
    Modal,
  },
  data() {
    return {
      title: "Hi Vue",
      secondcontent: "Im the second prop awesome",
    }
  },
}
</script>

#CHILD COMPONENT
<script>
export default {
    data() {
        return {
            toggle: true
        }
    },
    # accepts the props in the child component name content, props is always an array
    props: ['content', 'secondcontent'], 
    methods: {
        toggleModal() {
            this.toggle = true
        }
    },
}
</script>

<h1>{{ content }}</h1> # outputting or echoing the props in the child component 
<h2>{{ secondcontent }}</h2> # outputting or echoing the props in the child component 
         
div :class="{ sale: isSale == true}" > #binding a dynamic class using conditional statement
isSale: false #declaring the data isSale on data(){} method

















*/