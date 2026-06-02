import './bootstrap';

const menuToggle = document.querySelector('[data-mobile-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');
const menuIcon = document.querySelector('[data-mobile-menu-icon]');

if (menuToggle && mobileMenu && menuIcon) {
    const closeMenu = () => {
        mobileMenu.classList.add('hidden');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuIcon.textContent = 'menu';
    };

    const openMenu = () => {
        mobileMenu.classList.remove('hidden');
        menuToggle.setAttribute('aria-expanded', 'true');
        menuIcon.textContent = 'close';
    };

    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

        if (isOpen) {
            closeMenu();
            return;
        }

        openMenu();
    });

    document.querySelectorAll('[data-mobile-menu-link]').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', (event) => {
        const clickedInsideMenu = mobileMenu.contains(event.target);
        const clickedToggle = menuToggle.contains(event.target);

        if (!clickedInsideMenu && !clickedToggle) {
            closeMenu();
        }
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            closeMenu();
        }
    });
}
