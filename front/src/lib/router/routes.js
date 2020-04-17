import Home from '@/pages/Home'
import Employees from '@/pages/Employees'
import Login from '@/pages/Login'
import NotFound from '@/pages/404'

export default [{
  path: '/',
  name: 'home',
  component: Home
}, {
  path: '/login',
  name: 'login',
  component: Login
}, {
  path: '/employees',
  name: 'employees',
  component: Employees
}, {
  path: '/404',
  name: 'not_found',
  component: NotFound
}, {
  path: '*',
  redirect: { name: 'not_found' }
}]

// { path: '/lazy-load', component: () =>  import(/* webpackChunkName: "lazy-load" */ "./view/LazyLoad") },
