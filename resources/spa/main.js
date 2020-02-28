import Vue from "vue"
import store from "./store"
import router from "./router"
import App from "./App.vue"
import "./filters"
import "./axios"
import "./prefetchCore"

window.store = store
Vue.config.productionTip = false
new Vue({
  data: store,
  router,
  render: (h) => h(App)
}).$mount("#app")

