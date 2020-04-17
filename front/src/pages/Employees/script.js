import tablePagination from '@/mixin/tablePagination'
import Edit from './Edit'

export default {
  meta: {
    title: 'Companies Area'
  },

  components: { Edit },
  mixins: [tablePagination],

  data: () => ({
    modal: null,
    table: {
      url: 'employees',
      columns: [
        {
          title: 'ID',
          dataIndex: 'id',
          width: '100px',
          sorter: true
        }, {
          title: 'Name',
          customRender: val => `${val.f_name} ${val.l_name}`
        }, {
          title: 'Phone',
          dataIndex: 'phone',
          sorter: true
        }, {
          title: 'Email',
          dataIndex: 'email',
          sorter: true
        }, {
          title: 'Company',
          customRender: val => val.company.name
        }
      ]
    }
  }),

  methods: {
    toModal (obj = null) {
      if (!obj) {
        obj = { f_name: '', l_name: '', email: null, phone: null }
      }
      this.modal = Object.assign({}, obj)
    },
    remove (id) {
      this.$http.delete(`employees/${id}`).then(() => {
        this.getTable()
      })
    }
  },

  created () {
    if (this.$isRole('ADMIN')) {
      this.table.columns.push({
        title: '',
        width: '100px',
        scopedSlots: { customRender: 'delete' }
      }, {
        title: '',
        width: '80px',
        scopedSlots: { customRender: 'action' }
      })
    }
  }
}
