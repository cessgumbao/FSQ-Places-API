const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue', 
    './resources/**/*.{blade.php, js}',],
  theme: {
    extend: {
      screens: {
        'xs': '300px',
        // => @media (min-width: 300px) { ... }
  
        'sm': '640px',
        // => @media (min-width: 640px) { ... }
  
        'md': '1024px',
        // => @media (min-width: 1024px) { ... }
  
        'lg': '1280px',
        // => @media (min-width: 1280px) { ... }},
      }
    },
  },
  plugins: [],
}
