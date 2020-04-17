// import Vue from 'vue';

/** Check offline mode */
function handleNetwork () {
  window.document.body.classList.toggle('offline', !window.navigator.onLine)
}
handleNetwork()
window.addEventListener('online', handleNetwork)
window.addEventListener('offline', handleNetwork)


/** Scroll event for animations */
/*
Vue.prototype.animate = () => {
  if ( window.outerWidth < 768 ) return;

  let els = window.document.getElementsByClassName('animate');
  for (let i = 0; i < els.length; i++) {
    let top = els[i].getBoundingClientRect().top;

    if ( top - window.innerHeight / 1.5 < 0 )
      els[i].classList.add('anm-done');

    if ( top + els[i].offsetHeight + 100 < 0 || top > window.innerHeight + 100 )
      els[i].classList.remove('anm-done');
  }
};

window.addEventListener('scroll', () => {
  Vue.prototype.animate();
});

# In router:
router.afterEach(() => {
  setTimeout(() => Vue.prototype.animate(), 500);
});
*/
