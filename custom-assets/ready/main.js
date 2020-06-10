var burger = document.getElementById('burger');
var mobNav = document.getElementById('mob-nav');
burger.addEventListener('click', function(){
  this.classList.toggle('is-active');
  mobNav.classList.toggle('mob-nav--active');
})

