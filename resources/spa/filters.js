import Vue from "vue"
import {Duration} from "luxon"

Vue.filter("zeroPad", function (value) {
  return (value < 10 ? "0" : "") + value
})

Vue.filter("map", function (value, cb) {
  return value.map(cb)
})

Vue.filter("sum", function (value) {
  return value.reduce((a, v) => a + v, 0)
})

Vue.filter("duration", function (value) {
  return Duration.fromMillis(value)
    .toFormat((value >= 3600000 ? "hh:" : "") + "mm:ss")
})
