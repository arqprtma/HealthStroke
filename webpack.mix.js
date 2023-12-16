// Import Tailwind CSS
const tailwind = require("tailwindcss");

// Add Tailwind CSS to the mix
mix.js("resources/js/app.js", "public/js")
  .sass("resources/sass/app.scss", "public/css")
  .options({
    // Add Tailwind CSS to the webpack output
    output: {
      publicPath: "./",
      chunkFilename: "js/[name].js",
      filename: "css/[name].css",
    },
  })
  .postCss("resources/css/app.css", "public/css", [tailwind]);
