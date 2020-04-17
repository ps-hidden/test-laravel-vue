import axios from '@/lib/axios'

export default {
  namespaced: true,

  state: {
    data: null
  },

  mutations: {
    user (state, value = false) {
      state.data = value || false
    }
  },

  actions: {
    checkAuth (state) {
      axios.get('auth').then(r => {
        state.commit('auth', r)
      }).catch(() => {
        state.commit('auth')
      })
    }
  }
}
