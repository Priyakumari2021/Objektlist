import Alpine from 'alpinejs/dist/module.cjs'; 
window.Alpine = Alpine
 
Alpine.start()

$(document).ready(function(){
  console.log("This comes from js/app.js")
});

function ensurePageShouldBeLoaded() {

  var continuePageLoad = true,
      form = $('form');

  if (form.data("observer") && form.observer("status") == "dirty") {
    continuePageLoad = confirm(form.observer("confirm"));
    if (continuePageLoad) {
      form.observer("destroy");
    }
  }

  return continuePageLoad;
}