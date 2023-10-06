/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{css,html,js,php}"],
  theme: {
    extend: {
      spacing: {
        '350': '600px',
        '580': '578px',
      }
    },
  },
  plugins: [],
}

