import axios from "axios"
import Vue from "vue"
import errorHandler from "./errorHandler"
import data from "./data"
import router from "./router"
import App from "./App.vue"
import "./filters"
import "./errorHandler"

window.axios = axios
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

Vue.config.productionTip = false
new Vue({
  data,
  router,
  render: (h) => h(App)
}).$mount("#app")
