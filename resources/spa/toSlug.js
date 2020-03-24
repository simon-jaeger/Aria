// create an url safe slug
function toSlug(string) {
  return string.replace(/[\s/#?]/g, "-")
}
export default toSlug
