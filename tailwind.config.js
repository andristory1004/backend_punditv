/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontSize: {
        '16pt': '16 pt',
        '20': '20px',
        '36px': '36px'
      },
      fontFamily: {
        'lobster': ['Lobster'],
        'oswald': ['Oswald'],
        'kalam': ['Kalam'],
        'acme': ['Acme'],
        'satisfy': ['Satisfy']
      },
      colors: {
        'dark-a': '#2a2a4a',
        // 'dark-blue': '#1F1F39',
        'dark-blue': '#1a1a3c',
        'red': '#ff0000',
        'blue': '#0000ff'
      },
      height: {
        '10%': '10%'
      }
    },
  },
  plugins: [],
}
