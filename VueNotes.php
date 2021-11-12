<?php 

// HOW TO START //
first install nodejs so we can use node package manager or npm to install vue cli
type node -v on cmd or any command line to check if we installed nodejs properly
# command to instal vue cli #npm is the nodejs we install #-g means install the package globally
npm install -g @vue/cli
# example cd .. or cd Documents
change folder or directory to where we gonna create our project using cd command in the command line
# command to create the project #vue is the command from vue cli package we installed 
vue create project-name

// HOW TO SELECT FEATURES IN VUE //
select manually select features choose Typescript, Router, Vuex 
version 3
use class-style component syntax? No
use Babel alongside Typescript? Yes
use history mode for routers? Yes
Eslint with error prevention only
Lint on save
In dedicated config files


// HOW TO CHANGE DIRECTORY OR FOLDER //
cd ..
# to go back one folder 
cd project-name 
# open your favorite text editor
code . 
# serve or run the application to the browser 
npm run serve 

// VUE FILE AND DIRECTORY STRUCTURE //
#the folder for libraries and dependencies
node_modules 
#the public folder to be uploaded in the serve
public 
#this is where we mount our app.vue #mount means attaching our displaying our application
public > index.html 
#is the folder where we write our code
src 
src > assets folder 
src > components folder 
#the root component, #Vue files structure is <template></template> <script></script> <style></style>
src > App.vue file 
#inside is the code that starts our application, createapp and mount method, here we import the App.vue then mount it on the #app. id app is inside index.html from public folder 
src > main.js file
#the files to ignore or not to push on github when we upload our application to github
.gitignore 
#where we can see our project dependencies 
package.json 

install vetur extension for vue

<template></template> is a vue tag
<template>
    #double curly braces to output data from script
    <h1> {{ title }} </h1> 
</template>

<script>
export default {
  #name of the vue component
  name: 'App', 
  #data method
  data() { 
    #data method returns an object
    return { 
      #declaring a variable or data
      title: "Hi Vue", 
    }
  },
}
</script>

// HOW TO ADD CSS IN VUE //
#for css styling #our styles goes here
<style> </style>  
#for styling but limit the scoped within the components and not affect another component
<style scoped> 

// HOW TO BOILER PLATE VUE //
typing vue and pressing tab creates a boiler plate because of vetur extension

// HOW TO INSTALL PROJECT DEPENDENCIES //
npm install

// HOW TO USE REF IN OPTIONS API //
#ref is equevalent of getting the id or class in javascript like using queryselector
const ref = document.querySelector("#ref"); 
#input field on template
<input type="text" ref="name"> 
#to get the reference from script tag
this.$refs.name 


// WHAT IS COMPONENT TREE //
#the root component or the parent component
App.vue 
#child component of App.vue
header.vue 
#child component of App.vue
main.vue 
#child component of App.vue
footer.vue 
#parent component of nav
<header> 
#child component of header
<nav></nav> 
<header>

// HOW TO USE EVENTS IN VUE //
#click event
v-on:click ="";
#click event shorthand
@click ="";

  <div class="modal" v-show="toggle">
      <h1>content</h1>
  </div>
                  #toggle = !toggle to toggle something with its not equal value
  <button @click="toggle = !toggle">Click Me</button> 
  <button @click="toggleModal">Click Me</button> # click calls the function toggleModal

export default {
    data() {
        return {
            toggle: false
        }
    },
    #this is where we define or create our functions or methods 
    methods: { 
        toggleModal() {
            this.toggle = true
        }
    },
}

// HOW TO IMPORT COMPONENTS TO OTHER COMPONENTS //
#example the Modal component
import Modal from './components/Modal.vue'; 

#inside export default object
components: { 
    #register the component to the component where we want the component to be used
    Modal, 
 },
 #anywhere inside template. to where we are gonna output our component
 <Modal /> 

// HOW TO APPLY GLOBAL CSS //
#create a global.css or stylesheet in the assets folder then in the main.js file import the css
import './assets/global.css'

// CSS VARIABLE //
:root {
    --primary: #4f515a;
    --secondary: #ebebeb;
    --warning: #da0f41;
}
color: var(--primary);

// HOW TO USE PROPS //
    <h1> {{ title }} </h1>
    <Modal 
        #passing a props called content on parent component
        content="Im a prop"
        #binding the props value to a data so it can be dynamic 
        #:colon then the name of attribute is how we bind data to it   
        :secondcontent="secondcontent"                                               
    /> 

#parent component
import Modal from './components/Modal.vue';

  components: {
    Modal,
  },
  data() {
    return {
      title: "Hi Vue",
      secondcontent: "Im the second prop awesome",
    }

#child component
    data() {
        return {
            toggle: true
        }
    },

// HOW TO ACCEPTS PROPS //  
    #accepts the props in the child component name content, props is always an array
    props: ['content', 'secondcontent'], 
    methods: {
        toggleModal() {
            this.toggle = true
        }
    },
}
</script>

// HOW TO BIND DATA OR ATTRIBUTE //
#:colon then the name of attribute is how we bind data to it   
:secondcontent="secondcontent"

// HOW TO OUPUT OR ECHO A DATA // 
#outputting or echoing the props in the child component 
<h1>{{ content }}</h1> 
#outputting or echoing the props in the child component 
<h2>{{ secondcontent }}</h2> 
  
// HOW TO BIND A DYNAMIC CLASS //        
#binding a dynamic class using conditional statement
div :class="{ sale: isSale == true}" > 
#declaring the data isSale on data(){} method
isSale: false 


// HOW TO USE EMIT //
#how to emit an event from child to parent component, also called custom event
#child component
<div @click="clickSomething">
methods: {
    clickSomething() {
        #any event that we want to emit
        this.$emit('close') 
        #can also pass a data when emitting an event
        this.$emit('end', this.reactionTime); 
    }
}
#parent component
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


// HOW TO ACCEPT PROPS USING ROUTES //
// HOW TO USE PROPS IN ROUTERS //
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

// HOW TO USE COMPUTED IN COMPOSITION API //
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

// HOW TO USE ASYNC AND AWAIT // 
#show error if true or has value
<div v-if="error">{{ error }}</div> 
#show the postlist component if posts has length
<div v-if="posts.length"> 
<PostList :posts="posts" />
</div>
# showloading if posts has no length or empty
<div v-else>Loading...</div> 

#posts array
const posts = ref([]) 
#error null
const error = ref(null) 
# async to make the function asyncronous
const load = async () => { 
      try {
        #here we wait for the fetch api to get the data 
        let data = await fetch('http://localhost:3000/posts') 
          if(!data.ok) { # here if data.ok is true then make it false
            throw Error('no data available') # assign a custom error message
          }
          posts.value = await data.json() # await the data to be parse in json format
      }
      catch (err) { 
        error.value = err.message # assign the error message on error
        console.log(error.value)
      }
    }

    load() # invoke the function to run 

    return { posts, error }
}

// HOW TO CREATE REUSABLE COMPOSITION/COMPONENT FUNCTIONS // 
first create a folder in the src directory and you can give it any name eg. composables or helpers
then create a javsacript file eg. getPosts.js

//getPosts.js //
//importing ref from vue so we can use it 
import { ref } from '@vue/reactivity'

// reate a getPosts function same name with the file but we can name it whatever we want
const getPosts = () => { 
    const posts = ref([])
    const error = ref(null)

    const load = async() => {
        try {
            let data = await fetch('http://localhost:3000/posts')
            if (!data.ok) {
                throw Error('no data available')
            }
            posts.value = await data.json()
        } catch (err) {
            error.value = err.message
            console.log(error.value)
        }
    }
    #this is important, we must return the data so we can use it when we import it
    return { posts, error, load } 
}

#this is important, we need to export the function that we make so we can access it 
export default getPosts 

/* component */
import getPosts from '@/composables/getPosts' # the file path and name
  setup() {
    #deconstruct the data from getPosts
    const { posts, error, load } = getPosts() 
    #invoke the load function from getPosts
    load() 
    
    return { posts, error } 
}


// HOW TO USE POST IN COMPOSITION API // 
// HOW TO USE ROUTER IN COMPOSITION API //
<form @submit.prevent="handleSubmit">
  <label>Title:</label>
  <input v-model="title" type="text" required>
  <label>Content:</label>
  <textarea v-model="body" required></textarea>
  <label>Tags (hit enter to add a tag)</label>
  <input v-model="tag" @keydown.enter.prevent="handleKeyDown" type="text">
  <div v-for="tag in tags" :key="tag" class="pill">
    {{ tag }}
  </div>
  <button>Add Post</button>
</form>

<script>
import { ref } from '@vue/reactivity'
import { useRouter } from 'vue-router'

export default {
  setup() {
    const title = ref('')
    const body = ref('')
    const tag = ref('')
    const tags = ref([])
    const router = useRouter()
    const handleKeyDown = () => {
      if(!tags.value.includes(tag.value)) {
        #replace removes all whitespace
        tag.value = tag.value.replace(/\s/, '') 
        tags.value.push(tag.value)
      }
      tag.value = ''
    }
    const handleSubmit = async () => {
      const post = { 
        title: title.value,
        body: body.value,
        tags: tags.value
      }
      await fetch('http://localhost:3000/posts', 
        { method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify(post)
        })
        .catch((err) => console.log(err.message))
        router.push({ name: 'Home'})
    }

return { title, body, tag, tags, handleKeyDown, handleSubmit }


// HOW TO EMIT CUSTOM EVENT IN COMPOSITION API //
<script>
import { ref } from '@vue/reactivity'
import useLogin from '@/composables/useLogin'

export default {
  #here we must pass the context in the setup to use emit
  setup(props, context) { 
    const { error, login } = useLogin()
    const email = ref('')
    const password = ref('')

    const handleSubmit = async () => {
      await login(email.value, password.value)
      if(!error.value) {
        #context.emit to emit a custom event
        context.emit('login')
      }
    }

    return { email, password, error, handleSubmit }
  }
}
</script>


// HOW TO PASS DATA FROM COMPOSABLES OR HELPERS // 
const login = async(email, password) => {
    error.value = null

    try {
        const res = await signInWithEmailAndPassword(firebaseAuth, email, password)
        error.value = null
        console.log(res)
        return res
    } catch (err) {
        console.log(err.value)
        error.value = "Incorrect login credentials"
    }
}
    
const useLogin = () => {
            #we can also return a function
    return { error, login }
}

#here we export the useLogin function so we can pass both the error data and login function
export default useLogin


// HOW TO USE AUTHGUARD //
// HOW TO PROTECT ROUTE //
import { createRouter, createWebHistory } from 'vue-router'
import Welcome from '@/views/Welcome.vue'
import Chatroom from '@/views/Chatroom'
import { firebaseAuth } from '../firebase/config'

//auth guard
const requireAuth = (to, from, next) => {
    let user = firebaseAuth.currentUser
    if (!user) {
        next({ name: 'Welcome' })
    } else {
        next()
    }
}

const requireNoAuth = (to, from, next) => {
    let user = firebaseAuth.currentUser
    if (user) {
        next({ name: 'Chatroom' })
    } else {
        next()
    }
}

const routes = [{
        path: '/',
        name: 'Welcome',
        component: Welcome,
        beforeEnter: requireNoAuth
    },
    {
        path: '/chatroom',
        name: 'Chatroom',
        component: Chatroom,
        beforeEnter: requireAuth
    },

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router


// HOW TO CATCH ERROR IN FIREBASE //
// HOW TO CUSTOMIZE ERROR IN FIREBASE //
import { ref } from '@vue/reactivity'
import { firebaseAuth } from '../firebase/config'
import { createUserWithEmailAndPassword, updateProfile } from "firebase/auth";

const error = ref(null)
const isPending = ref(false)

const signup = async(email, password, displayName) => {
    error.value = null
    isPending.value = true

    try {
        const res = await createUserWithEmailAndPassword(firebaseAuth, email, password)
        if (!res) {
            throw new Error('Could not complete the signup. Please try again later.')
        }
        await updateProfile(firebaseAuth.currentUser, { displayName: displayName })
        error.value = null
        isPending.value = false
            /* console.log(res.user) */
        return res
    } catch (err) {
        console.log(err)
        const errorCode = err.code
        if (errorCode == 'auth/weak-password') {
            error.value = 'The password you entered is too weak.'
        } else if (errorCode == 'auth/email-already-in-use') {
            error.value = 'The email address is already in use.';
        } else {
            error.value = err.message
        }
        isPending.value = false
    }

}

const useSignup = () => {
    return { error, isPending, signup }
}

export default useSignup


// HOW TO ADD TAILWIND TO VUE //
vue add tailwind // type in command
npx tailwindcss -o tailwind.css --watch // to watch every changes


// VUE CLI HOT REALOAD PROBLEM //
Solution
in package.json change
"serve": "vue-cli-service serve",
to
"serve": "vue-cli-service serve --host localhost",
or
add
module.exports = {
  devServer: {
    host: 'localhost'
  }
}
to
vue.config.js

// VUE SCRIPT SETUP //
<script setup lang="ts" >
import HelloWorld from '/components/HelloWorld.vue';
let name = "DJ";
</script>



// TYPESCRIPT //
https://hackernoon.com/migrating-from-javascript-to-typescript-some-tips
npm install --save-dev @types/react
function computeGlobalGrade(studentName: string | undefined | null) {
    const nameOne: string = studentName;
    // Typescript will complain that the student name might be null and cannot be assigned to a string

    const nameTwo: string = studentName!;
    // compiles fine because you tell compiler that null | undefined are excluded 
}
interface ClaimCertStepsProps {
  i18nCertText: string;
  isProjectsCompleted: boolean;
  steps: string;
  superBlock: string;
}
interface SudentProperties {
    name?: string,
    age?: number
}
let student: SudentProperties = {};
student.name = "ismail";
student.age = 15;

// TYPESCRIPT FOR PROPS //
props: {
    // type check
    height: Number,
    // type check plus other validations
    age: {
      type: Number,
      default: 0,
      required: true,
      validator: value => {
        return value >= 0
      }
    }



    



















// GLOSSARY //

component = resuable vue instances / a template that we can use to segregate the function of a website
props = data that we pass from parent component to child component
emit = a custom event that occurs in the child component and pass data to the parent component
slot = where we display the data from parent component to child component
computed = to compute a value using other data value and return it 
reactive = to track the change of a value/state of a variable/data in the compositonAPI/setup()

























