import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#4bb4de",
                secondary: "#0F4C81",
                accent: "#00d379",
                neutral: "#ded9da",
                "base-100": "#efefef",
                info: "#2b6a84",
                success: "#31A640",
                warning: "#EDAE49",
                error: "#D1495B",
                light: "#f9fdfe",
                dark: "#262626",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
