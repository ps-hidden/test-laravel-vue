export default {
  namespaced: true,

  state: {
    loading: 0,
    options: {}
  },

  mutations: {
    loading (state, value) {
      state.loading += value === 1 ? 1 : -1
      if (state.loading < 0) state.loading = 0
    },
    options (state, value) {
      state.options = Object.assign({}, value || {})
    }
  },

  actions: {

  }
}
