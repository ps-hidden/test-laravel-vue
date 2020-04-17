import Vue from 'vue'

Vue.filter('numStr', function (value) {
  if (typeof value !== 'number') return value
  value = value.toString().replace(/[^.0-9]/gim, '').trim() || 0
  return new Intl.NumberFormat('en-US').format(value)
})
