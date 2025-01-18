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
                bloom: 'bloom 2s ease-in-out forwards', 
                float: 'float 6s ease-in-out infinite', 
            },
            keyframes: {
                bloom: {
                    '0%': { transform: 'scale(0)', opacity: '0' }, 
                    '50%': { transform: 'scale(0.8)', opacity: '0.7' }, 
                    '100%': { transform: 'scale(1)', opacity: '1' }, 
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
            screens: {
                customHeaderLogo: { min: '769px', max: '900px' }, // Custom breakpoint
            },
        },
    },
    
    plugins: [],
};