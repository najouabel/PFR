/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      backgroundImage:{
        "img":"url('../../public/images/image.jpg')"
      }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

