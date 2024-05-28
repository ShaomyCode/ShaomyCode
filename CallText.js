// Get the button element
const showTextButton = document.getElementById('ShowDetails');

// Get the element with the hidden text
const hiddenTextElement = document.querySelector('.HideText');

// When the button is clicked, make the text visible
showTextButton.addEventListener('click', function() {
  // hiddenTextElement.style.visibility = 'visible'; 
  // hiddenTextElement.style.display = "block";
  hiddenTextElement.style.opacity = "1";
  // or 'display: block;' or 'opacity: 1;'
});
