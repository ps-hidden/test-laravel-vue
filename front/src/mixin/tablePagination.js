export default {
  data: vm => ({
    table: {
      url: '',
      loading: false,
      pagination: Object.assign({}, vm.$tablePagination),
      params: { perPage: 10, page: 1, orderBy: 'id', orderDir: 'desc' },
      array: [],
      columns: []
    }
  }),
  methods: {
    getTable () {
      this.table.loading = true
      this.$http.get(this.table.url, { params: this.table.params }).then(res => {
        this.table.pagination = Object.assign({}, this.table.pagination, { total: res.total })
        this.table.array = res.data
        this.table.loading = false
        if (typeof this.afterGetTable === 'function') this.afterGetTable(res)
      }).catch(() => { this.table.loading = false })
    },
    tableChange (pagination, filters, sorter) {
      this.table.pagination = Object.assign({}, this.table.pagination, { current: pagination.current })
      this.table.params = {
        perPage: pagination.pageSize,
        page: pagination.current,
        orderBy: sorter.field || (sorter.column || {}).sortId || this.table.params.orderBy,
        orderDir: sorter.order ? sorter.order.slice(0, -3) : this.table.params.orderDir
      }
      this.getTable()
    }
  },
  created () {
    this.getTable()
  }
}

/*
### In component ###

<a-table :scroll="{ x: 900 }"
         :columns="table.columns"
         :rowKey="record => record.id"
         :dataSource="table.array"
         :pagination="table.pagination"
         :loading="table.loading"
         @change="tableChange" />

### Script ###
add mixin
set table.columns
set table.url
*/
