/**
 * Tailwind build config for Open ZAD Theme.
 *
 * Source-of-truth for the compiled assets/css/main.css. Colors map to CSS
 * custom properties so the Customizer can repaint the theme at runtime
 * (see inc/customizer.php). Build with:  npm run build
 *
 * @type {import('tailwindcss').Config}
 */
module.exports = {
	content: [
		'./*.php',
		'./inc/**/*.php',
		'./template-parts/**/*.php',
	],
	theme: {
		extend: {
			colors: {
				primary: 'rgb(var(--color-primary) / <alpha-value>)',
				secondary: 'rgb(var(--color-secondary) / <alpha-value>)',
				accent: 'rgb(var(--color-accent) / <alpha-value>)',
				'accent-hover': 'rgb(var(--color-accent-hover) / <alpha-value>)',
				surface: 'rgb(var(--color-surface) / <alpha-value>)',
				'surface-alt': 'rgb(var(--color-surface-alt) / <alpha-value>)',
				background: 'rgb(var(--color-background) / <alpha-value>)',
				text: 'rgb(var(--color-text) / <alpha-value>)',
				'text-muted': 'rgb(var(--color-text-muted) / <alpha-value>)',
				muted: 'rgb(var(--color-muted) / <alpha-value>)',
				border: 'rgb(var(--color-border) / <alpha-value>)',
				success: 'rgb(var(--color-success) / <alpha-value>)',
				error: 'rgb(var(--color-error) / <alpha-value>)',
				warning: 'rgb(var(--color-warning) / <alpha-value>)',
				info: 'rgb(var(--color-info) / <alpha-value>)',
			},
			fontFamily: {
				sans: [
					'"IBM Plex Sans Arabic"',
					'system-ui',
					'-apple-system',
					'"Segoe UI"',
					'Roboto',
					'Helvetica',
					'Arial',
					'sans-serif',
				],
			},
		},
	},
	plugins: [],
};
