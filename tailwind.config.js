const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                dark: {
                    900: '#0c0d12',
                    800: '#12141c',
                    700: '#171923',
                    600: '#252a37',
                }
            }
        },
    },
    plugins: [require('tailwind-scrollbar')],
}
