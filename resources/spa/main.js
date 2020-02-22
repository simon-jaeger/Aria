import axios from "axios"
import Vue from "vue"
import App from "./App.vue"
import router from "./router"
import data from "./data"
import "./filters"

window.axios = axios
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

Vue.config.productionTip = false
new Vue({
  data,
  router,
  render: (h) => h(App)
}).$mount("#app")
