const promptly = require("promptly")
const sh = require("shelljs")
sh.config.fatal = true

async function main() {
  console.log("")
  console.log("=================================================")
  console.log("  Aria setup script  ")
  console.log("=================================================")
  console.log("")

  // check requirements/path
  if (!sh.which("mysql") || !sh.which("php") || !sh.which("npm")) {
    throw new Error("Make sure that mysql, php and npm are included in your PATH")
  }

  // get db credentials
  const DB_DATABASE = await promptly.prompt("Database name: (aria) ", {default: "aria"})
  const DB_USERNAME = await promptly.prompt("Database user: (root) ", {default: "root"})
  const DB_PASSWORD = await promptly.password("Database password: ", {replace: "*"})

  // generate .env file
  sh.cp(".env.example", ".env")
  sh.sed("-i", "{{ DB_DATABASE }}", DB_DATABASE, ".env")
  sh.sed("-i", "{{ DB_USERNAME }}", DB_USERNAME, ".env")
  sh.sed("-i", "{{ DB_PASSWORD }}", DB_PASSWORD, ".env")
  sh.exec("php artisan key:generate")
  console.log(".env file generated")

  // create database
  sh.exec(`mysql -u${DB_USERNAME} ${DB_PASSWORD ? "-p" + DB_PASSWORD : ""} -e "CREATE DATABASE IF NOT EXISTS ${DB_DATABASE}"`)
  sh.exec("php artisan migrate:fresh --seed")
  console.log("Database generated")

  // compile frontend assets
  sh.exec("npm run dev")
  console.log("Frontend assets compiled")

  // all done
  console.log("\n\n")
  console.log("=================================================")
  console.log("Setup finished!")
  console.log("Have fun with Aria!")
}

main().catch(e => console.error("\n\n", e))

