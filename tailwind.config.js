/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {
            fontFamily: {
                libbask: ['"Libre Baskerville"', "serif"],
                habibi: ["Habibi", "serif"],
                poppins: ["Poppins", "serif"],
            },
        },
    },
    plugins: [],
};
