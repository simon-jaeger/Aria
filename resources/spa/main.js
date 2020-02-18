import axios from "axios"
import {Duration} from "luxon"
import Vue from "vue"
import VueRouter from "vue-router"
import App from "./App.vue"
import Series from "./views/Series"
import SeriesSingle from "./views/SeriesSingle"
import Playlists from "./views/Playlists"
import History from "./views/History"
import Settings from "./views/Settings"

// TODO: maybe lazy load certain heavy routes, example below:
// const LazyRoute = () => import(/* webpackChunkName: "LazyRoute" */ './views/LazyRoute')

window.axios = axios
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

Vue.filter("zeroPad", function (value) {
  return (value < 10 ? "0" : "") + value
})
Vue.filter("duration", function (value) {
  return Duration.fromMillis(value)
    .toFormat((value >= 3600000 ? "hh:" : "") + "mm:ss")
})

Vue.use(VueRouter)

new Vue({
  render: function (h) {
    return h(App)
  },
  router: new VueRouter({
    mode: "history",
    linkActiveClass: "is-active",
    linkExactActiveClass: "is-activeExact",
    scrollBehavior(to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition
      } else {
        return {x: 0, y: 0}
      }
    },
    routes: [
      {path: "/player", redirect: "/player/series"},
      {path: "/player/series", component: Series},
      {path: "/player/series/:id", component: SeriesSingle},
      {path: "/player/playlists", component: Playlists},
      {path: "/player/history", component: History},
      {path: "/player/settings", component: Settings},
    ]
  })
}).$mount("#app")
