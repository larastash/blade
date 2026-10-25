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

    toggleTheme(event) {
        const idx = this.allowedThemes.indexOf(this.currentTheme);
        const next = this.allowedThemes[(idx + 1) % this.allowedThemes.length];

        const canAnimate = typeof document.startViewTransition === 'function'
            && ! window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (! canAnimate) {
            this.currentTheme = next;
            return;
        }

        const origin = this.transitionOrigin(event);
        const radius = Math.hypot(
            Math.max(origin.x, window.innerWidth - origin.x),
            Math.max(origin.y, window.innerHeight - origin.y),
        );

        const transition = document.startViewTransition(() => {
            this.currentTheme = next;
            this.applyTheme();
        });

        transition.ready.then(() => {
            document.documentElement.animate(
                {
                    clipPath: [
                        `circle(0px at ${origin.x}px ${origin.y}px)`,
                        `circle(${radius}px at ${origin.x}px ${origin.y}px)`,
                    ],
                },
                {
                    duration: 500,
                    easing: 'ease-in-out',
                    pseudoElement: '::view-transition-new(root)',
                },
            );
        }).catch(() => {});
    },

    transitionOrigin(event) {
        // Для клика берём точку курсора, для клавиатуры (clientX = 0) — центр кнопки.
        if (event && (event.clientX || event.clientY)) {
            return { x: event.clientX, y: event.clientY };
        }

        const rect = (event?.currentTarget ?? this.$el).getBoundingClientRect();

        return { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
    },

    isDark() {
        if (this.currentTheme === 'system') {
            return window.matchMedia('(prefers-color-scheme: dark)').matches;
        }
        return this.currentTheme === 'dark';
    }
});
