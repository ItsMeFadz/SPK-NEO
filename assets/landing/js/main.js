document.addEventListener('DOMContentLoaded', () => {

    // =========================
    // MOBILE MENU
    // =========================
    const menuBtn = document.getElementById('menu-btn');
    const sideNav = document.getElementById('side-nav');
    const menuIcon = document.getElementById('menu-icon');

    const openMenu = () => {
        sideNav.classList.add('is-open');
        menuIcon.classList.replace('fa-bars-staggered', 'fa-xmark');
        document.body.style.overflow = 'hidden';
    };

    const closeMenu = () => {
        sideNav.classList.remove('is-open');
        menuIcon.classList.replace('fa-xmark', 'fa-bars-staggered');
        document.body.style.overflow = '';
    };

    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            sideNav.classList.contains('is-open') ? closeMenu() : openMenu();
        });
    }

    // =========================
    // TAB LOGIN / REGISTER
    // =========================
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const tabIndicator = document.getElementById('tab-indicator');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    if (tabLogin && tabRegister) {
        const setTabs = (isLogin) => {
            tabIndicator.style.transform = isLogin ? 'translateX(0%)' : 'translateX(100%)';

            loginForm.classList.toggle('hidden', !isLogin);
            registerForm.classList.toggle('hidden', isLogin);
        };

        tabLogin.addEventListener('click', () => setTabs(true));
        tabRegister.addEventListener('click', () => setTabs(false));

        setTabs(true);
    }

    // =========================
    // HITUNG USIA
    // =========================
    const tglLahir = document.getElementById('tgl_lahir');
    const usia = document.getElementById('usia');

    if (tglLahir && usia) {
        tglLahir.addEventListener('change', () => {
            const dob = new Date(tglLahir.value);
            const today = new Date();

            let age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            usia.value = age > 0 ? age : 0;
        });
    }
    
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        closeMenu();
    });
});

sideNav.addEventListener('click', (e) => {
    if (e.target === sideNav) {
        closeMenu();
    }
});

});
