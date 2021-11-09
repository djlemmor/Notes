<? php

// GLOSSARY //
#local - the computer you are working on 
# repository - the location where the data is stored and managed
# origin - the main or master branch in the github repository
# checkout - to change branches or in command line cd to change directory


// HOW TO ADD A PROJECT TO GITHUB //
1. Create a new repository on GitHub
2. Open Git Bash.
3. Change the current working directory to your local project.
4. Initialize the local directory as a Git repository.
$ git init -b main
5. Add the files in your new local repository. This stages them for the first commit.
$ git add .
6. Commit the files that youve staged in your local repository.
$ git commit -m "First commit"
7. At the top of your GitHub repositorys Quick Setup page, click  to copy the remote repository URL.
8. In the Command prompt, add the URL for the remote repository where your local repository will be pushed.
#sets the new remote
$ git remote add origin  <REMOTE_URL>  
#verifies the new remote URL
$ git remote -v 
9. Push the changes in your local repository to GitHub.
#pushes the changes in your local repository up to the remote repository you specified as the origin
$ git push origin main 

// HOW TO PUSH OR UPDATE THE GITHUB REPOSITORY FROM LOCAL //
#add the files to be push
git add . 
#-m means message, message or description of the update to be commited
git commit -m "message" 
#origin is the url or the repo to be push and main is where is the update file coming from to be push or updated
git push origin main 


// HOW TO USE FIREBASE STORAGE //
import { getStorage, ref } from "firebase/storage";
const firestoreStorage = getStorage();


# how to push the local repository to github repository
git add .
git commit -m "updates" # -m for message or label of the update
git push origin dev-branch # basically means to push to the origin the dev-branch updates

# how to update the local repository 
git checkout master # to go to the master branch
git pull # pull from the github repository to the local repository
git checkout dj-dev # go to the dj-dev branch
git merge master # merge the master branch and dj-dev local branch

# what if you cant merge or cant pull
git reset --hard # to reset the local update so you can merge with the github repository
esc then :q! # press the escape key on the keyboard and type :q! if prompted




















