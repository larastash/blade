import colors from 'tailwindcss/colors';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './**/*.blade.php',
        './**/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Noto Sans"', ...defaultTheme.fontFamily.sans],
                serif: ['"Noto Serif"', ...defaultTheme.fontFamily.serif],
                mono: ['"Noto Sans Mono"', ...defaultTheme.fontFamily.mono],
            },
        },
    },
}
