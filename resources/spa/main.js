import Vue from "vue"
import VueMeta from "vue-meta"
import store from "./Store"
import player from "./Player"
import router from "./router"
import App from "./App.vue"
import axios from "./axios"
import "./filters"
import './directives'

Vue.config.productionTip = false
Vue.use(VueMeta)
window.store = store
window.player = player
window.router = router
window.axios = axios
window.root = new Vue({
  data: {store, player},
  router,
  render: (h) => h(App)
}).$mount("#app")
