import axios from "axios"
import Vue from "vue"
import errorHandler from "./errorHandler"
import data from "./data"
import router from "./router"
import App from "./App.vue"
import "./filters"

window.axios = axios
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

Vue.config.productionTip = false
Vue.config.errorHandler = errorHandler
new Vue({
  data,
  router,
  render: (h) => h(App)
}).$mount("#app")
