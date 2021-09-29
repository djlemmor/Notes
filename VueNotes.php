<?php 
// VUE 3 NOTES //

# HOW TO START? 
first install nodejs so we can use node package manager or npm to install vue cli
type node -v on cmd or any command line to check if we installed nodejs properly
npm install -g @vue/cli //command to instal vue cli// npm is the nodejs we install // -g means install the package globally
change folder or directory to where we gonna create our project using cd command in the command line //example cd .. or cd Documents
vue create project-name // command to create the project // vue is the command from vue cli package we installed 

#START OF VUE CREATE OPTIONS
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

How to push or update the github repo from local
git add . # add the files to be push
git commit -m "message" # -m means message, message or description of the update to be commited
git push origin main # origin is the url or the repo to be push and main is where is the file coming from to be push or updated

How to use ref in options API
ref is equevalent of getting the id or class in javascript like using queryselector
const ref = document.querySelector("#ref"); 
<input type="text" ref="name" > # input field on template
this.$refs.name # to get the reference from script tag


What is component tree
App.vue is the root component or the parent component
header.vue # child component of App.vue
main.vue # child component of App.vue
footer.vue # child component of App.vue
<header> # parent component of nav
<nav></nav> # child component of header
<header>

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

# How to use props 
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


# how to emit an event from child to parent component, also called custom event
# child component
<div @click="clickSomething">
methods: {
    clickSomething() {
        this.$emit('close') # any event that we want to emit
        this.$emit('end', this.reactionTime); # can also pass a data when emitting an event
    }
}
# parent component
<Modal @close="closeModal" /> # name of the child component
<Block @end="endGame" /> # name of the child component
methods: {
    closeModal() {
        this.modalClose = !this.modalClose
    },
    endGame(reactionTime){ # the data we pass on with the event becomes the arguments
      this.score = reactionTime
    },
}
# end of emit

# how to toggle boolean in javascript
@click="toggle = !toggle">

# click event modifiers
<button @click.shift="">Click Me</button> # only click when pressing shift key
<button @click.self="">Click Me</button> # only affect the target element when click, does not affect child or parent component

# how to pass templates from parent to child component? By using Slots
# parent component
<Modal>
    <h1>Content 1</h1> # the component slot area
    <h2>Content 2</h2> 
    <template v-slot:link> # link is the name of the slot
        <a href="">Im a name slot</a>
    </template>
</Modal>
# child component
<div>
    <slot></slot> # where the slot is gonna be rendered
    <slot>Default Content</slot> # slot can also have a default content, only if it doesnt have a data 
</div>
<slot name='link'></slot> # name slot rendered here
# end of slot

# How to use the teleport directive?
<teleport to=".modals"></teleport> # from <div></div> to <teleport to=".modals"></teleport> just replace tag
<div class="modals"></div> # to where the tag will be teleported

# How to use mounted hook?
mounted() {
        console.log("mounted");
},

# How to use javascript built-in functions
mounted() {
    console.log("mounted");
    setTimeout(() => { # setTimeout function
        this.showBlock = true
    },this.delay);
},

# Two way data binding
# How to use v-model? 
<template>
  <form>
      <label>Email:</label>
      <input v-model="email" type="email" required> # bind the email data to the input field
  </form>
  <p> {{ email }} </p> # output the data email
</template>

<script>
export default {
    data() {
        return{
            email: '' # declare the email on data function
        }
    }
}
</script>

# How to use Multiple Checkboxes in a form
<div>
    <input v-model="names" type="checkbox" value="shaun">
    <label>Shaun</label>
</div>
<div>
    <input v-model="names" type="checkbox" value="yoshi">
    <label>Yoshi</label>
</div>
<div>
    <input v-model="names" type="checkbox" value="mario">
    <label>Mario</label>
</div>

names: [] # to store the names on an array 

# How to use vue router
when creating a project using vue cli manually select Router and select yes if prompt use web history

<template>
  <div id="nav">
    <router-link to="/">Home</router-link> | # router link browser
    <router-link to="/about">About</router-link> # router link, rendered as an a tag in browser
    <router-link :to="{ name: 'About' }">About</router-link> # data bind the route with it's name 
  </div> 
  <router-view/> # where the route is going to get display
</template>

# Dynamic Routes
{
    path: '/jobs/:id',
    name: 'JobDetails',
    component: JobDetails
}

# How to get the route parameters and assign in to a data
data() {
    return {
        id: this.$route.params.id  # depends on the route parameter 
        name: this.$route.params.name # depends on the route parameter
    }
}

# How to get the parameters data and go to that route
<router-link :to="{ name: 'JobDetails', params: { id: job.id }}">


# How to accept props using routes
{
    path: '/jobs/:id',
    name: 'JobDetails',
    component: JobDetails,
    props: true
}

props: ['id'],

# How to redirect a route or link
{
    path: '/all-jobs',
    redirect: '/jobs'
}

# How to redirect all non existing routes and redirect it to a page or component
{
    path: '/:catchAll(.*)',
    name: 'Not Found',
    component: NotFound
}

# How to fetch data using fetch api / built-in javascript method
mounted() {
    fetch('http://localhost:3000/jobs')
      .then(res => res.json())
      .then(data => this.jobs = data)
      .catch(err => console.log(err.message))
}

# How to use json server 

first create a folder name db
inside db create a file db.json

npm install json-server
npx json-server --watch data/db.json # file path 

# How to delete data using fetch api 
data() {
    return{
            showDetails: false,
            uri: 'http://localhost:3000/projects/'+this.project.id # storing the api url
        }
    },
methods: {
    deleteProject(){ # function name, fires when click
      fetch(this.uri, { method: 'DELETE' }) # pass a DELETE on the second argument
        .then(() => this.$emit('delete', this.project.id)) # emitting a custome delete event to update the local data 
        .catch(err => console.log(err.message)) # check if there is an error
    },
},

# How to update data using fetch api
toggleComplete(){
    this.project.complete = true # what you want to update
    fetch(this.uri,
        { method: 'PUT', # use put method
          headers: {'Content-Type': 'application/json'}, # headers of json
          body: JSON.stringify(this.project), }) # convert the data of project to json string
        .then(res => res.json()) # get the response
        .then(data => this.$emit('complete', data)) # get the data of response
        .catch(err => console.log(err.message))
} # the question is how do we know what data to be updated? the answer is in the uri, in the uri we pass the project.id


# How to patch request using fetch api / patch request is when you just have to update 1 data 
toggleComplete(){
    fetch(this.uri, 
        { method: 'PATCH', 
          headers: {'Content-Type': 'application/json'}, 
          body: JSON.stringify({ complete: !this.project.complete })
    }).then(() => {
          this.$emit('complete', this.project.id)}
    ).catch(err => console.log(err))
}


# How to bind class
<div class="project" :class="{ complete: project.complete }"> # takes object the first is the classname and 2nd is the condition

# How to add css on the active route
a.router-link-active {
  border-bottom: 2px solid #00ce89;
  padding-bottom: 4px;
}

# Access the data from custom event on the component
updateFilter(by){
      this.$emit('fiterChange', by) # Child Component
},
<FilterNav @fiterChange="current = $event" /> # $event is the data that has been pass # Parent Component

# Computed Example
computed: {
    filteredProjects() {
        if(this.current === 'completed' ){
            return this.projects.filter( project => project.complete)
        }
        if(this.current === 'ongoing' ){
            return this.projects.filter( project => !project.complete)
        }
      return this.projects
    }
}

# How to use composition API
setup() { # setup runs before any lifecycle hook 
    let name = 'mario' # declaring variable in the composition API
    let age = 26 # not reactive means if the value here change, the value in the template does not change

    const handleClick = () => { # creating a function in the composition API
      console.log('You click me');
    }
    return {
      name, age, handleClick # we must return the data so we can use or output it in the template
    }
}

# How to make data or variables in composition API reactive
import { ref, reactive } from '@vue/reactivity' # we must import ref from vue to use it in the setup

setup() {
    const name = ref('mario') # by using ref we can make the data reactive
    const ninjaOne = ref({ name: 'mario', age: 30}) # by using ref we can make the data reactive
    const ninjaTwo = reactive({ name: 'luigi', age: 35 }) # by using reactive we can make the data reactive

    const handleClick = () => {
      name.value = 'luigi' # how to change the value of a ref data
    }

    const updateNinjaOne = () => {
      ninjaOne.value.age = 40 # how to change the value of a reactive data
    }

    const updateNinjaTwo = () => {
      ninjaTwo.age = 45; # how to change the value of a reactive data
    }

    return {
      name, ninjaOne, ninjaTwo, handleClick, updateNinjaOne, updateNinjaTwo
    }
}

# How to use computed in composition API
<input type="text" v-model="search">
<p> Search term: {{ search }}</p>
<div v-for="name in matchingNames" :key="name">

import { ref, computed } from '@vue/reactivity'
setup() {
    const search = ref('')
    const names = ref(['mario', 'yoshi', 'luigi', 'toad', 'bowser', 'koopa', 'peach'])
    
    const matchingNames = computed(() => {
      return names.value.filter((name) => name.includes(search.value))
    })
    
return { names, search, matchingNames }

# How to use watch and watchEffect in composition API
setup() {
    const search = ref('')
    const names = ref(['mario', 'yoshi', 'luigi', 'toad', 'bowser', 'koopa', 'peach'])

    const stopWatch = watch(search, () => { # the first argument is the data that we want to watch
      console.log('watch function work') # store the watch hook to a variable to stop it from watching
    }) 

    const stopEffect = watchEffect(() => {  # no need to put arguments
      console.log('watchEffect function work', search.value) # put the data that we want to watch inside 
    })

    const matchingNames = computed(() => {
      return names.value.filter((name) => name.includes(search.value))
    })

    const handleClick = () => {
      stopWatch() # invoke the function to stop the watch
      stopEffect()  # invoke the function to stop the watchEffect
    }

return { names, search, matchingNames, handleClick }

# How to use props in composition API
props: ['post'],
  setup(props){ # setup first argument is props
    const snippet = computed(() => {
      return props.post.body.substring(0,20) + '.....' # here we access the props post body and modifed it
    })

    return { snippet }

# How to use lifecycle hook on compositonAPI
setup() {
    onMounted(() => console.log('component mounted'))
    onUnmounted(() => console.log('component unmounted'))
    onUpdated(() => console.log('component updated'))
    return {}
}




































/* GLOSSARY */

component = resuable vue instances / a template that we can use to segregate the function of a website
props = data that we pass from parent component to child component
emit = a custom event that occurs in the child component and pass data to the parent component
slot = where we display the data from parent component to child component
computed = to compute a value using other data value and return it 
reactive = to track the change of a value/state of a variable/data in the compositonAPI/setup()

























*/