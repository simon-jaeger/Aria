import Vue from "vue"
import store from "./store"
import router from "./router"
import App from "./App.vue"
import axios from "./axios"
import "./filters"

window.store = store
window.axios = axios
window.root = new Vue({
  data: store,
  router,
  render: (h) => h(App)
}).$mount("#app")
Vue.config.productionTip = false
