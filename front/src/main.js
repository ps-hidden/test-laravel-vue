import Vue from 'vue'
import VueBus from 'vue-bus'

import './config/prototypes'
import './config/events'
import './config/filters'
import './lib/ant-design/'
import i18n from './lib/i18n/'
import store from './lib/store/'
import router from './lib/router/'
import App from './App.vue'

const files = require.context('./assets/svg-inline/', false, /\.svg$/)
files.keys().forEach(files)

Vue.config.productionTip = false
Vue.use(VueBus)


Vue.prototype.$http.get('init').then(r => {
  Vue.prototype.$http.defaults.headers['X-CSRF-TOKEN'] = r.token
  Vue.prototype.$csrf = r.token
  store.commit('app/options', r.options)
  store.commit('auth/user', r.user)

  new Vue({
    el: '#app',
    i18n,
    store,
    router,
    render: h => h(App)
  })
})
