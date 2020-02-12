// create an url safe slug
export function toSlug(string) {
  return string.replace(/[\s/#?]/g, "-")
}
