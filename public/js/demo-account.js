document.addEventListener('DOMContentLoaded', function() {
    const loadingOverlay = document.querySelector('.loading-overlay');
    
    Object.assign(loadingOverlay.style, {
        display: 'none',
        position: 'fixed',
        top: '0',
        left: '0',
        width: '100%',
        height: '100%',
        backgroundColor: 'rgba(255, 255, 255, 0.8)',
        justifyContent: 'center',
        alignItems: 'center',
        zIndex: '9999'
    });

    // Map
    const userCredentials = {
        'censeur-option': { email: 'demo.censeur@example.com', password: 'demo123' },
        'eleve-option': { email: 'demo.eleve@example.com', password: 'demo123' },
        'professeur-option': { email: 'demo.professeur@example.com', password: 'demo123' }
    };

    Object.keys(userCredentials).forEach(userId => {
        const option = document.getElementById(userId);
        if (option) {
            option.addEventListener('click', function() {
                const credentials = userCredentials[userId];

                // Remplissage du formulaire
                const form = document.querySelector('.login-form');
                if (form) {
                    form.querySelector('#email').value = credentials.email;
                    form.querySelector('#password').value = credentials.password;
                    
                    const modalElement = document.getElementById('demoAccountModal');
                    if (modalElement) {
                        const modal = bootstrap.Modal.getInstance(modalElement);
                        if (modal) modal.hide();
                    }

                    loadingOverlay.style.display = 'flex';
                    setTimeout(() => form.submit(), 100);
                }
            });
        }
    });
});
