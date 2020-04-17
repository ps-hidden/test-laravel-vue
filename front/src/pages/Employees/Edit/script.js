export default {
  data: () => ({
    item: {},
    value: undefined,
    company_name: '',
    array: {}
  }),
  methods: {
    save () {
      let id = ''
      let method = 'post'
      if (this.item.id) {
        id = `/${this.item.id}`
        method = 'put'
      }

      this.$http[method](`employees${id}`, this.item).then(() => {
        this.$parent.getTable()
        this.$parent.modal = null
      })
    },
    handleSearch (el) {
      this.$http.get(`companies/by-name?name=${el.target.value}`).then(r => {
        this.array = r
      })
    },
    handleChange (id) {
      if (!this.item.company) {
        this.$set(this.item, 'company', {})
        this.item.company = {}
      }
      this.item.company_id = id
      this.item.company.name = this.array[id]
    }
  },
  created () {
    this.item = { ...this.$parent.modal }
    if (this.$parent.modal.company) {
      this.item.company = { ...this.$parent.modal.company }
    }
  }
}
