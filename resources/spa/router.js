import Vue from "vue"
import VueRouter from "vue-router"
import Series from "./views/Series"
import SeriesSingle from "./views/SeriesSingle"
import Playlists from "./views/Playlists"
import PlaylistSingle from "./views/PlaylistSingle"
import History from "./views/History"
import Settings from "./views/Settings"
import NotFound from "./views/NotFound"

// TODO: maybe lazy load certain heavy routes, example below:
// const LazyRoute = () => import(/* webpackChunkName: "LazyRoute" */ './views/LazyRoute')

Vue.use(VueRouter)
export default new VueRouter({
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
    {path: "/player/series/:slug", component: SeriesSingle},
    {path: "/player/playlists", component: Playlists},
    {path: "/player/playlists/:slug", component: PlaylistSingle},
    {path: "/player/history", component: History},
    {path: "/player/settings", component: Settings},
    {path: "/player/not-found", component: NotFound},
    {path: "/player/*", component: NotFound}
  ]
})
