window.onload = function () {
   document.getElementById('menu-tab').onclick = function() {
       var menu = document.getElementById('phone-header-nav');
       menu.classList.toggle('open');
   }

}