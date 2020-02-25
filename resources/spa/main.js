import Vue from "vue"
import data from "./data"
import router from "./router"
import App from "./App.vue"
import "./filters"
import "./axios"

Vue.config.productionTip = false
new Vue({
  data,
  router,
  render: (h) => h(App)
}).$mount("#app")
