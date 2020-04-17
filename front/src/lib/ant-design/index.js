import Vue from 'vue'

import {
  Button,
  Checkbox,
  Col,
  Dropdown,
  FormModel,
  Input,
  message,
  Modal,
  Pagination,
  Radio,
  Row,
  Select,
  Switch,
  Table
} from 'ant-design-vue'

import 'ant-design-vue/lib/style/index.css'
import 'ant-design-vue/lib/button/style/index.css'
import 'ant-design-vue/lib/checkbox/style/index.css'
import 'ant-design-vue/lib/dropdown/style/index.css'
import 'ant-design-vue/lib/form-model/style/index.css'
import 'ant-design-vue/lib/grid/style/index.css'
import 'ant-design-vue/lib/input/style/index.css'
import 'ant-design-vue/lib/message/style/index.css'
import 'ant-design-vue/lib/modal/style/index.css'
import 'ant-design-vue/lib/pagination/style/index.css'
import 'ant-design-vue/lib/radio/style/index.css'
import 'ant-design-vue/lib/select/style/index.css'
import 'ant-design-vue/lib/switch/style/index.css'
import 'ant-design-vue/lib/table/style/index.css'


Vue.use(Button)
Vue.use(Checkbox)
Vue.use(Col)
Vue.use(Dropdown)
Vue.use(FormModel)
Vue.use(Input)
Vue.use(Modal)
Vue.use(Pagination)
Vue.use(Radio)
Vue.use(Row)
Vue.use(Select)
Vue.use(Switch)
Vue.use(Table)

Vue.prototype.$message = {
  error: message.error,
  success: message.success
}
