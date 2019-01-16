var timeout = false;
const maxFontSize = 10;
const shrinkDimension = 568;
var currentFontSize;

// window.resize callback function
function setBodyFont() {
    setTimeout(function(){
        if(window.innerWidth >= shrinkDimension && typeof currentFontSize !== undefined) {
            currentFontSize = undefined;
    
            Array.from(document.querySelectorAll('html, body')).forEach(function(node, index) {
                node.style.fontSize = '';
            });
        }
    
        if(window.innerWidth < shrinkDimension) {
            currentFontSize = (maxFontSize/shrinkDimension) * window.innerWidth;
            Array.from(document.querySelectorAll('html, body')).forEach(function(node, index) {
                node.style.fontSize = currentFontSize + 'px';
            });
        }
    }, 0);
}

// window.resize event listener
window.addEventListener('resize', function() {
  clearTimeout(timeout);
  // start timing for event "completion"
  timeout = setTimeout(setBodyFont, 250);
});

setBodyFont();