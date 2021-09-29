<? php

Adding a project to GitHub without GitHub CLI
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
$ git remote add origin  <REMOTE_URL>  # Sets the new remote
$ git remote -v # Verifies the new remote URL
9. Push the changes in your local repository to GitHub.
$ git push origin main # Pushes the changes in your local repository up to the remote repository you specified as the origin








