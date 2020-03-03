import Vue from "vue"
import VueRouter from "vue-router"
import Series from "./views/Series"
import SeriesSingle from "./views/SeriesSingle"
import Playlists from "./views/Playlists"
import PlaylistsSingle from "./views/PlaylistsSingle"
import History from "./views/History"
import Settings from "./views/Settings"
import e404 from "./views/e404"
import e500 from "./views/e500"

// TODO: rm dev route
import _dev from "./views/_dev"

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
    {path: "/player/_dev", component: _dev},
    {path: "/player", redirect: "/player/series"},
    {path: "/player/series", component: Series},
    {path: "/player/series/:slug", component: SeriesSingle},
    {path: "/player/playlists", component: Playlists},
    {path: "/player/playlists/:slug", component: PlaylistsSingle},
    {path: "/player/history", component: History},
    {path: "/player/settings", component: Settings},
    {path: "/player/404", component: e404},
    {path: "/player/500", component: e500},
    {path: "/player/*", component: e404}
  ]
})
