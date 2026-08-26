export default () => ({
    allowedThemes: ['light', 'dark', 'system'],
    defaultTheme: 'system',
    currentTheme: null,

    init() {
        try {
            const stored = localStorage.getItem('theme');
            if (stored && this.allowedThemes.includes(stored)) {
                this.currentTheme = stored;
            } else {
                this.currentTheme = this.defaultTheme;
                localStorage.setItem('theme', this.defaultTheme);
            }
        } catch (e) {
            this.currentTheme = this.defaultTheme;
        }

        this.applyTheme();

        this.$watch('currentTheme', (value) => {
            if (this.allowedThemes.includes(value)) {
                try {
                    localStorage.setItem('theme', value);
                } catch (e) {
                    console.warn('Failed to save theme:', e);
                }
            }
            this.applyTheme();
        });
    },

    applyTheme() {
        const root = document.documentElement;
        if (this.currentTheme === 'system') {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            root.classList.toggle('dark', prefersDark);
        } else {
            root.classList.toggle('dark', this.currentTheme === 'dark');
        }
    },

    toggleTheme() {
        const idx = this.allowedThemes.indexOf(this.currentTheme);
        this.currentTheme = this.allowedThemes[(idx + 1) % this.allowedThemes.length];
    },

    isDark() {
        if (this.currentTheme === 'system') {
            return window.matchMedia('(prefers-color-scheme: dark)').matches;
        }
        return this.currentTheme === 'dark';
    }
});