import Vue from "vue"
import {Duration} from "luxon"

Vue.filter("zeroPad", function (value) {
  return (value < 10 ? "0" : "") + value
})

Vue.filter("duration", function (value) {
  return Duration.fromMillis(value)
    .toFormat((value >= 3600000 ? "hh:" : "") + "mm:ss")
})
