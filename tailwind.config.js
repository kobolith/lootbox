const typography = require('@tailwindcss/typography');

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
				'press-start': ['"Press Start 2P"', 'system-ui', 'sans-serif'],
			},
			backgroundImage: {
				'makai': "url('/images/MAKAI.png')",
			},
			listStyleImage: {
				checkmark: 'url("/images/checkmark.png")',
			},
		},
	},
	plugins: [
		typography({
			// Your configuration options for @tailwindcss/typography
		}),
	],
}
  

