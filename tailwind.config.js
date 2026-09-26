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
            colors: {
                primary: colors.orange,
                info: colors.blue,
                success: colors.green,
                danger: colors.red,
                warning: colors.amber,
                gray: colors.neutral,
            },
            borderRadius: {
                brand: defaultTheme.borderRadius['xl'],
            },
        },
    },
}
