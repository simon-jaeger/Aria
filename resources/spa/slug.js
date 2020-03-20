// create an url safe slug
function slug(string) {
  return string.replace(/[\s/#?]/g, "-")
}
export default slug
