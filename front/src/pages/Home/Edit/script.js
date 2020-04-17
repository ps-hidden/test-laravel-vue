export default {
  data: () => ({
    item: {}
  }),
  methods: {
    save () {
      const input = document.getElementById('company_logo')
      const formData = new FormData()
      let id = ''
      let method = 'POST'

      if (this.item.id) {
        method = 'PUT'
        id = `/${this.item.id}`
      }
      formData.append('_method', method)
      formData.append('name', this.item.name || '')
      formData.append('email', this.item.email || '')
      formData.append('website', this.item.website || '')

      if (input && input.files[0]) {
        formData.append('logo', input.files[0])
      }

      this.$http.post(`companies${id}`, formData).then(() => {
        this.$parent.getTable()
        this.$parent.modal = null
      })
    }
  },
  created () {
    this.item = { ...this.$parent.modal }
  }
}
