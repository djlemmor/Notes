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



// CSS RESET // 
*,
*::before,
*::after {
	box-sizing: border-box;
}

html {
	font-family: "Poppins";
}



// NOTES // 
anything related to typography is inherited
margin is for adding space between elements or outside of the element
padding is for adding space inside the element
if adding padding and margin dont work on the element, we must display block the element
the css cascade algorithm uses, 1. origin and importance, 2. specificity, 3. order of appearance
3. order of appearance, see what the order the css style was declared






