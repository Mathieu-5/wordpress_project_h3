var lavalampElm = document.querySelector('.vcmp-lavalamp');
var positionLavalamp = function(activeElm) {
  lavalampElm.style.width = activeElm.offsetWidth + 'px';
  lavalampElm.style.left = activeElm.offsetLeft + 'px';
};
var elm = document.querySelector('#vcmp-main-header');
var ms = new MenuSpy(elm, {
  callback: positionLavalamp
});

positionLavalamp( elm.querySelector('li.active') );