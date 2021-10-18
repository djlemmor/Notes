<? php

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
























