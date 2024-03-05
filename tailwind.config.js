// const plugin = require('@tailwindcss/typography');
const plugin = require('tailwindcss/plugin');
// const plugin1 = require('tailwindcss/plugin1');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        'custom-red': '#e3120b',
        'custom-green': '#e9fcf8',
        'custom-pastal': '#f5f4ef',
        'custom-black': '#1a1a1a',
        'custom-white': '#fff',
        'pastal-green': '#e9fcf8',
        'dark-grey': '#333333',
        'dark-blue': '#1f2e7a',
      },
      letterSpacing: {
        tight: '-0.02em',
        normal: '0',
        wide: '1em',
      },
      screens: {
        'max-2xl': {'max': '1535px'},
        'max-xl': {'max': '1280px'},
        'max-lg': {'max': '1024px'},
        'max-md': {'max': '768px'},
        'max-sm': {'max': '640px'},
      },
      content: {
        'rightArrow': 'url("../assets/arrow-right-solid.svg")',
      },
    },
  },
  plugins: [
    // require('@tailwindcss/typography'), //adding plugin

    plugin(function({addComponents}){   //adding component
      addComponents({
        '.btn': {
          padding: '8px 20px',
          backgroundColor: '#273444', 
          borderRadius: '9999px', 
          color: '#ffffff', 
          borderWidth: '1px',
          borderStyle: 'solid',
          borderColor: '#273444',
          transition: '0.5s',
        },  
        // '.btn:hover':{
        //   backgroundcolor: '#fff',
        //   color: '#1f2e7a',
        //   borderColor: '#1f2e7a',
        // }
      })
    }),

    // plugin(function({addVariant}){    // addvariant
    //   addVariant('hocus', ['&:hover', '&:focus'])
    // })
    // plugin(function ({ matchVariant }) {
    //   matchVariant(
    //     'nth',
    //     (value) => {
    //       return `&:nth-child(${value})`;
    //     },
    //     {
    //       values: {
    //         1: '1',
    //         2: '2',
    //         3: '3',
    //       },
    //     }
    //   );
    // }),
    // plugin(function ({ addUtilities, theme, variants }) {
    //   const letterSpacings = theme('letterSpacing');
    //   const utilities = {};

    //   for (const key in letterSpacings) {
    //     utilities[`.tracking-${key}`] = { letterSpacing: letterSpacings[key] };
    //   }

    //   addUtilities(utilities, variants('letterSpacing'));
    // }),

    plugin(function({ addVariant }) {
      addVariant('optional', '&:optional')
      addVariant('hocus', ['&:hover', '&:focus'])
      addVariant('inverted-colors', '@media (inverted-colors: inverted)')
    })
  ],
}

