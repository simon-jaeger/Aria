// global error handler
// TODO: handle rejected promises too
// TODO: improve global error handling, show notification to user

window.onerror = function (e) {
  console.error('--------[ GLOBAL ERROR]--------')
  console.error(e)
}

