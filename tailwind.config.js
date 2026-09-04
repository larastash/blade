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
                sans: ['"Inter"', ...defaultTheme.fontFamily.sans],
                serif: ['"Lora"', ...defaultTheme.fontFamily.serif],
                mono: ['"Source Code Pro"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: colors.orange,
                info: colors.blue,
                success: colors.green,
                danger: colors.red,
                warning: colors.amber,
                gray: {
                    50: '#fefdf9',
                    100: '#f4f3ee',
                    200: '#e6e4dc',
                    300: '#d4d1c5',
                    400: '#b1ada1',
                    500: '#948f81',
                    600: '#757063',
                    700: '#5c584e',
                    800: '#373734',
                    900: '#141413',
                    950: '#0a0a0a',
                },
                white: '#fefdf9',
                black: '#050504',
            },
            borderRadius: {
                brand: defaultTheme.borderRadius['xl'],
            },
        },
    },
}
