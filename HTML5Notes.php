<?php

# two ways to write a submit button in HTML
<input type="submit" value="Submit this form">
<button type="submit">Submit this form</button>

# form example
<form>
  <fieldset>
    <legend>Operating System</legend>
    <label>
      <input type="radio" name="os" value="windows">
      Windows
    </label>
    <label>
      <input type="radio" name="os" value="mac">
      Mac
    </label>
    <label>
      <input type="radio" name="os" value="linux">
      Linux
    </label>
  </fieldset>

  <fieldset>
    <legend>Favorite JS Frameworks</legend>
    <label>
      <input type="checkbox" name="ck-angular" value="angular">
      Angular
    </label>
    <label>
      <input type="checkbox" name="ck-react" value="react">
      React
    </label>
    <label>
      <input type="checkbox" name="ck-vue" value="vue">
      Vue
    </label>
    <label>
      <input type="checkbox" name="ck-svelte" value="svelte">
      Svelte
    </label>
  </fieldset>

  <label>
    Position
    <select name="position">
      <option value="" selected></option>
      <option value="fs">Full Stack</option>
      <option value="fe">Front End</option>
      <option value="be">Back End</option>
      <option value="de">Designer</option>
      <option value="pm">Project Manager</option>
      <option value="ceo">CEO</option>
    </select>
  </label>

  <label>
    Years of Experience
    <input name="exp" type="number">
  </label>

  <fieldset>
    <label>
      First Name
      <input name="fname">
    </label>
    <label>
      Last Name
      <input name="lname">
    </label>
  </fieldset>  

  <label>
    Email
    <input name="email" type="email">
  </label>

  <label>
    Comments
    <textarea name="comments"></textarea>
  </label>

  <button type="submit">Submit</button>
</form>


# Always wrap an input field with form
<form>
  <label for="search">
    <span class="visually-hidden">Search</span>
    <input id="search" name="search" />
    <button class="visually-hidden">Submit</button>
  </label>
</form>


















