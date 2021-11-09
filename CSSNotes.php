<?php 

// ANATOMY OF A CSS RULE  //

p {
  color: #444;
  font-size: 21px;
}
# p is the selector
# color and font-size is the property 
# 444 and 21px is the value

box-sizing: border-box;
# the size or width of the element is not only determine by the width of the content but also includes the padding and the border

min-height: 150px; 
# if you really want to add height to an element

font-family: inherit;
# buttons and inputs don't inherit from their parents

@media only screen and (min-width: 1080px) {}
# for responsive

// CSS RESET // 
*,
*::before,
*::after {
  box-sizing: border-box;
}

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

:root {
  --primary-color: #007AF3;
}

body {
  background: #f0f2f5;
  margin: 0;
  font-family: 'Poppins';
}

a {
  color: #444444;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.container {
   width: 1080px;
   margin: 0 auto;
 }



# how to declare or make a css variable
:root {
  --heading-font: 'Quicksand', sans-serif;
  --body-font: 'Roboto', sans-serif;
  --primary-color: #367bf5;
  --background-primary-color: rgba(54, 123, 245, 0.05);
  --secondary-color: #f3aa18;
}

# how to use a css variable
background: var(--white-color);

# how to select the last child of an element or div
.product-tab-item-main:last-child {
  margin: 0;
}

# how to select the 4th child of an element or div
.product-tab-item-main:nth-of-type(4n+4) {
  margin: 0;
}


# how to flex an item or div
display: flex;
flex-wrap: nowrap | wrap | wrap-reverse; # wrap makes the extra div or items to go down
flex-direction: row | row-reverse | column | column-reverse; # flex properties


# properties for flex items, can only be applied if you display:flex the parent of the item or div
flex: 2 2 10%; # flex-grow | flex-shrink | flex-basis



input,
select,
textarea {
  width: 100%;
  max-width: 100%;
  font: inherit;
  color: inherit;
}

input[type="checkbox"],
input[type="radio"],
input[type="submit"],
input[type="button"] {
  width: auto;
}

fieldset,
legend {
  margin: 0;
  border: 0;
  padding: 0;
}

.visually-hidden {
  position: absolute;
  overflow: hidden;
  clip: rect(0 0 0 0);
  width: 1px;
  height: 1px;
  margin: -1px;
  border: 0;
  padding: 0;
}

# how to hide the increment/decrement buttons on a number input
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  appearance: none;
}
input[type="number"] {
  -moz-appearance: textfield;
}

# how to hide the arrow/chevron on a select input
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none; /* hides the native UI */

  padding-right: 1.5em; /* prevents input text from running into background image */

  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8" fill="none" stroke="black"><path d="M7.5 3L4 6 .5 3"/></svg>');
  background-size: 0.7em;
  background-repeat: no-repeat;
  background-position: right 0.5em center;
}

# how to style the search input
input[type="search"] {
  padding-right: 1.5em;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none" stroke="black" stroke-width="2"><circle cx="7" cy="7" r="6" /><path d="M11 11 L15 15" /></svg>');
  background-size: 0.7em;
  background-repeat: no-repeat;
  background-position: right 0.5em center;
}

# how to hide the cancel button on inputs
input[type="search"]::-webkit-search-cancel-button {
  display: none;
}

#adding a search icon on a search input
<form>
  <label for="search">
    <span class="visually-hidden">Search</span>
    <input type="search" name="search" id="search" />
  </label>
  <button type="submit">
    <span class="visually-hidden">Submit</span>
    <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none" stroke="#444" stroke-width="2px"><circle cx="7" cy="7" r="6" /><path d="M11 11 L15 15" /></svg>
  </button>
</form>


form {
  position: relative;
}

input {
  padding-right: 1.5em;
}

button {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  border: 0;
  background: transparent;
}

button svg {
  width: 1em;
  height: 1em;
  vertical-align: middle;
}
#end of adding a search icon on a search input

// HOW TO STYLE CHECKBOX //

/* The container */
.container {
  position: relative;
  padding-left: 55px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 50px;
  border-radius: 50px;
  border: 1px solid skyblue;
}


/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: skyblue;
}

.container input:checked ~ .checkmark:after {
  left: 50%; 
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  background-color: skyblue;
}


/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 0px;
  top: 0px;
  width: 23px;
  height: 23px;
  background-color: #2196F3;
  border-radius: 50%;
  transition: left ease-in-out 0.4s;
  border: 1px solid #fff;
}

<h1>Custom Checkboxes</h1>
<label class="container">One
  <input type="checkbox">
  <span class="checkmark"></span>
</label>




https://hackernoon.com/the-best-way-to-build-html-forms-styling


// NOTES // 
anything related to typography is inherited
margin is for adding space between elements or outside of the element
padding is for adding space inside the element
if adding padding and margin dont work on the element, we must display block the element
the css cascade algorithm uses, 1. origin and importance, 2. specificity, 3. order of appearance
3. order of appearance, see what the order the css style was declared







