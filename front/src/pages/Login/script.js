import store from '@/lib/store'

export default {
  meta: {
    title: 'Login Page',
    auth: false
  },

  data: () => ({
    form: {
      email: 'admin@admin.com',
      password: 'password'
    }
  }),

  methods: {
    signIn () {
      this.$http.post('auth', this.form).then(r => {
        store.commit('auth/user', r)
        this.$router.push({ name: 'home' })
      })
    }
  },

  created () {

  }
}
