/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.html", "./*.php", "./templates/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite/plugin')],
}

/* Start the Tailwind CLI build process
npx tailwindcss -i ./public/css/input.css -o ./public/css/output.css --watch
*/