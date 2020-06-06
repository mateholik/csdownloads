var burger = document.getElementById('burger');
var mobNav = document.getElementById('mob-nav');
burger.addEventListener('click', function(){
  console.log('paspaude');
  this.classList.toggle('is-active');
  mobNav.classList.toggle('mob-nav--active');
})

