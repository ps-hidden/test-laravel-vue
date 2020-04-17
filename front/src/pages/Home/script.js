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
      url: 'companies',
      columns: [
        {
          title: 'ID',
          dataIndex: 'id',
          width: '100px',
          sorter: true
        }, {
          title: 'Logo',
          width: '80px',
          scopedSlots: { customRender: 'logo' }
        }, {
          title: 'Name',
          dataIndex: 'name',
          sorter: true
        }
      ]
    }
  }),

  methods: {
    toModal (obj = null) {
      if (!obj) {
        obj = { name: '', email: null, website: null }
      }
      this.modal = { ...obj }
    },
    remove (id) {
      this.$http.delete(`companies/${id}`).then(() => {
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
