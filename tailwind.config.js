/** @type {import('tailwindcss').Config} */
// import preset from './vendor/filament/support/tailwind.config.preset'
 
export default {
  // presets: [preset],
  content: [
    './app/Filament/**/*.php',
    './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        main: '#121D50',
        // change this values to prefered color scheme
        primary: '#4d148c', // purple-ish color
        secondary: '#ff6200', // orange color
        light: '#EDF0F3', // light background


      }
    },
  }

}

