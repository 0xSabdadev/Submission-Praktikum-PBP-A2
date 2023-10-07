/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./*.php', './app/views/*.php', './templates/*.php'],
	theme: {
		extend: {},
	},
	plugins: [require('flowbite/plugin')],
};
