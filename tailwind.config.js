/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        grayBlue: "#9da5bd",
        seaBlue: "#3a4c7a",
        deepBlue: "	#0a205a",
        waterBlue: "#1e3c6e",
        skyBlue: "#79aaf7",
      },
      boxShadow: {
        imageShadow: "0px 0px 30px 3px rgb(0,0,0,0.2) 0.5",
      },
      keyframes: {
        fadedLeft: {
          "0%": { translate: "-50vw 0", opacity: "0" },
          "75%": { translate: "5px 0" },
          "100%": { translate: "0 0", opacity: "1" },
        },
        fadedRight: {
          "0%": { translate: "50vw 0", opacity: "0" },
          "75%": { translate: "-5px 0" },
          "100%": { translate: "0 0", opacity: "1" },
        },
        fadedTop: {
          "0%": { translate: "0 50vw", opacity: "0" },
          "75%": { translate: "0 -5px" },
          "100%": { translate: "0 0", opacity: "1" },
        },
        fadedBottom: {
          "0%": { translate: "0 -50vw", opacity: "0" },
          "75%": { translate: "0 -5px" },
          "100%": { translate: "0 0", opacity: "1" },
        },
        vibrateX: {
          "0%,100%": { translate: "10px 0" },
          "50%": { translate: "-10px 0" },
        },
      },
      animation: {
        moveFromLeft: "fadedLeft 1s ease-in-out 1",
        moveFromRight: "fadedRight 1s ease-in-out 1",
        moveFromTop: "fadedTop 1s ease-in-out 1",
        moveFromBottom: "fadedBottom 1s ease-in-out 1",
        vibrateX: "vibrateX 100ms ease-in-out 3",
      },
    },
  },
  plugins: [],
};
