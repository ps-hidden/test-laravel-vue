import Vue from 'vue'
import moment from 'moment'
import store from '../lib/store/'
import axios from '../lib/axios'

Vue.prototype.$moment = moment
Vue.prototype.$http = axios
Vue.prototype.$csrf = null
Vue.prototype.$baseUrl = process.env.BASE_URL
Vue.prototype.$isLoading = () => store.state.app.loading > 0

/**
 * Get user data or user field
 *
 * @param {string|null} field
 */
Vue.prototype.$user = (field = null) => {
  const u = store.state.auth.data
  if (!u) return u
  return field ? (u[field] || null) : u
}

/**
 * Get an item from an array or object using "dot" notation.
 *
 * @param {object} object
 * @param {string} path
 * @param {*} value
 * @return {*}
 */
Vue.prototype.$get = (object, path, value = undefined) => {
  return path.split('.').reduce((prevObj, key) => prevObj && prevObj[key], object) || value
}

/**
 * Validate user role
 *
 * @param {string|array} roles - role name or array of names for checking
 * @param {string|null} val - compare with role
 */
Vue.prototype.$isRole = (roles, val = null) => roles.indexOf(val || Vue.prototype.$user('role')) > -1

/**
 * Simple notification
 *
 * @param {string|null} message
 * @param {int} type - 0 error | 1 success
 */
Vue.prototype.$msg = (message = null, type = 0) => {
  if (!message || typeof message !== 'string') message = 'Something went wrong.'
  Vue.prototype.$message[type !== 1 ? 'error' : 'success'](message, 5)
}

/** Global settings for pagination of `ant design` table */
Vue.prototype.$tablePagination = {
  pageSizeOptions: ['10', '20', '50'],
  showSizeChanger: true,
  showTotal: (total, range) => `${range[0]}-${range[1]} of ${total}`
}
