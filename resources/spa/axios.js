import router from "./router"
import axios from "axios"

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

// global error handling
axios.interceptors.response.use(null, error => {
  switch (error.response.status) {
    case 401:
      router.replace("/login")
      break
    case 404:
      router.replace("/player/404")
      break
    case 500:
    default:
      router.replace("/player/500")
      break
  }
  return Promise.reject(error)
})

export default axios
