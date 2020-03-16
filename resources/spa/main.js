import Vue from "vue"
import store from "./Store"
import player from "./Player"
import router from "./router"
import App from "./App.vue"
import axios from "./axios"
import "./filters"

window.store = store
window.player = player
window.router = router
window.axios = axios
window.root = new Vue({
  data: {store, player},
  router,
  render: (h) => h(App)
}).$mount("#app")
Vue.config.productionTip = false
