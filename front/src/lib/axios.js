import Vue from 'vue'
import axios from 'axios'
import store from './store'


const http = axios.create({
  baseURL: process.env.BASE_URL + 'rest/',
  headers: { 'X-CSRF-TOKEN': Vue.prototype.$csrf },
  transformRequest: (data, heads) => {
    store.commit('app/loading', 1)
    const fd = data instanceof FormData
    heads['Content-Type'] = fd ? 'multipart/form-data' : 'application/json'
    return fd ? data : JSON.stringify(data)
  },
  transformResponse: data => {
    store.commit('app/loading', -1)
    return JSON.parse(data)
  }
})


http.interceptors.response.use(
  response => {
    if (response.data.message) {
      Vue.prototype.$msg(response.data.message, 1)
    }
    return response.data
  },
  error => {
    if (error.response && error.response.data.message) {
      Vue.prototype.$msg(error.response.data.message, 0)
    }
    throw new Error('Response')
  }
)


export default http
