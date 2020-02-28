// prefetch essential core data on idle time of not already loaded

window.requestIdleCallback(prefetch, {timeout: 2000})

async function prefetch() {
  if (!store.playlists.length) {
    store.playlists = (await axios.get("/api/playlists")).data
  }
  if (!store.series.length) {
    store.series = (await axios.get("/api/series")).data
  }
}

