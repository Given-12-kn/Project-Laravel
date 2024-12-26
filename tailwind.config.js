import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
      theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                bloom: 'bloom 2s ease-in-out forwards', // Animasi mekar
                float: 'float 6s ease-in-out infinite', // Animasi mengapung
            },
            keyframes: {
                bloom: {
                    '0%': { transform: 'scale(0)', opacity: '0' }, // Kuncup
                    '50%': { transform: 'scale(0.8)', opacity: '0.7' }, // Proses
                    '100%': { transform: 'scale(1)', opacity: '1' }, // Mekar
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
            },
            colors: {
                gradientStart: '#c4e0f9',
                gradientMid: '#b5a7f9',
                gradientEnd: '#f9c3e0',
                flowerPink: '#ff007f',
                flowerYellow: '#ffd700',
                flowerBlue: '#00bfff',
                flowerPurple: '#8a2be2',
            },
        },
    },
    
    plugins: [],
};
