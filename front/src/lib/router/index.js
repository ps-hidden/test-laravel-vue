import Vue from 'vue'
import Router from 'vue-router'
import store from '../store/'
import routes from './routes'

Vue.use(Router)


const checkAccess = to => {
  const user = store.state.user
  const meta = Object.assign({}, ...(to.matched.map(item => item.meta) || { a: 1 }))
  const auth = meta.auth === true
  const guest = meta.auth === false

  if (
    (meta.roles && meta.roles.indexOf((user || {}).role) < 0) ||
    (guest && user) ||
    (auth && !user)
  ) return false

  document.title = meta.title || 'Laravel'
  return true
}


const parseRoutes = array => {
  return array.map(item => {
    const route = { ...item }
    if (!route.meta) {
      route.meta = {}
    }
    if (route.children) {
      route.children = parseRoutes(route.children)
    }
    if (route.component) {
      route.meta = { ...route.meta, ...(route.component.meta || {}) }
    }
    return route
  })
}


const router = new Router({
  base: process.env.BASE_URL,
  linkActiveClass: 'active',
  linkExactActiveClass: '',
  mode: 'history',
  routes: parseRoutes(routes)
})


router.beforeEach((to, from, next) => {
  if (checkAccess(to)) next()
  else next({ name: 'not_found' })
})

export default router

