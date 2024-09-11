/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
      ],
      darkMode:"selector",
  theme: {

        fontFamily:{
            sans:['Montserrat' , 'sans-serif'],
            serif: ['Merriweather', 'serif'],
        },

        fontSize: {
            sm: '1rem',
            base: '1.6rem',
            xl: '9.8rem',
            '2xl': '1.4rem',
            '3xl': '1.6rem',
            '4xl': '1.8rem',
            '5xl': '2rem',
            '6xl': '2.4rem',
            '7xl': '3rem',
            '8xl': '3.6rem',
            '9xl': '4.4rem',
            '10xl': '5.2rem',
            '11xl': '6.2rem',
            '12xl': '7.4rem',
            '13xl': '8.6rem',
            '14xl': '9.8rem',
        },

        extend : {

            colors:{
                'green-800':'#1b4332',
                'green-700':'#2d6a4f',
                'green-600':'#40916c',
                'green-500':'#52b788',
                'green-400':'#74c69d',
                'green-300':'#95d5b2',
                'green-200':'#b7e4c7',
                'green-100':'#d8f3dc',
                'green-dark':'#081c15',
                'white' : "#fff",
                'red':'red'
            },

            spacing:{
                '12xl':"12.8rem",
                '11xl':"9.6rem",
                '10xl':"8rem",
                '9xl':"6.4rem",
                '8xl':"4.8rem",
                '7xl':"3.2rem",
                '6xl':"2.4rem",
                '5xl':"1.6rem",
                '4xl':"1.2rem",
                '3xl':"0.8rem",
                '2xl':"0.4rem",
            },
            keyframes:{
                slideIn:{
                    '0%' : {transform : "translateX(100%)"},
                    '100%': { transform: 'translateX(0%)' },
                },

                slideDown:{
                    "0%" : {transform: "translateY(-100%)"},
                    "100%" : {transform: "translateY(0%)"}
                }

            },
            animation: {
                slideIn: 'slideIn 1s ease-out forwards',
                slideDown: 'slideDown 1s ease-out forwards'
            },
        }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

// SPACING SYSTEM (px) / Whitespaces
// 2 / 4 / 8 / 12 / 16 / 24 / 32 / 48 / 64 / 80 / 96 / 128

// FONT SIZE SYSTEM (px)
// 10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74 / 86 / 98
