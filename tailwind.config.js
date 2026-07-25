/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          // Palette asli StrokeCare (tidak diubah, hanya dijadikan token)
          primary: "#15ADA7",        // teal — warna brand utama
          "primary-dark": "#1d8b88", // teal gelap — hover
          accent: "#0085FF",         // biru — link / aksen
          ghost: "#F8F8FF",          // ghost white — background halaman (JANGAN pakai "base": bentrok dengan text-base)
        },
        fontFamily: {
          sans: ["Mulish", "ui-sans-serif", "system-ui", "sans-serif"],
        },
      },
    },
    plugins: [],
  }
