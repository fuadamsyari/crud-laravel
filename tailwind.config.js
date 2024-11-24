/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                leckerli: ["Leckerli One", "cursive"], // Nama font Leckerli
                lilita: ["Lilita One", "cursive"],
            },
        },
    },
    plugins: [],
};
