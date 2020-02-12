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

Vue.use(VueRouter)
new Vue({
  render: function (h) { return h(App) },
  router: new VueRouter({
    mode: "history",
    linkActiveClass: 'is-active',
    linkExactActiveClass: 'is-activeExact',
    routes: [
      {path: "/player", redirect: "/player/series"},
      {path: "/player/series", component: Series},
      {path: "/player/series/ar-tonelico", component: SeriesSingle},
      {path: "/player/playlists", component: Playlists},
      {path: "/player/history", component: History},
      {path: "/player/settings", component: Settings},
    ]
  })
}).$mount('#app')
