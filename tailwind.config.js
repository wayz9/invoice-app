const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode : 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Raleway-v4020', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                primary: colors.yellow
            }
        },
    },
    plugins: [require('tailwind-scrollbar'), require('@tailwindcss/line-clamp')],
}
