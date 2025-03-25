document.addEventListener("DOMContentLoaded", function() {
    const authForm = document.getElementById('auth-form');
    const signupForm = document.getElementById('signup-form');
    const errorContainer = document.getElementById('error-container') || document.createElement('div');
    
    if (!document.getElementById('error-container')) {
        errorContainer.id = 'error-container';
        authForm.parentNode.insertBefore(errorContainer, authForm);
    }

    // Toggle between login and signup forms
    document.querySelectorAll('[id^="toggle-"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            authForm.style.display = authForm.style.display === 'none' ? 'block' : 'none';
            signupForm.style.display = signupForm.style.display === 'none' ? 'block' : 'none';
            clearErrors();
        });
    });

    // Password visibility toggle
    window.togglePassword = function(inputId) {
        const input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
    };

    function clearErrors() {
        errorContainer.innerHTML = '';
        errorContainer.className = '';
    }

    function showErrors(errors) {
        clearErrors();
        errorContainer.className = 'alert alert-danger';
        let errorHTML = '<ul>';
        
        if (typeof errors === 'string') {
            errorHTML += `<li>${errors}</li>`;
        } else {
            for (const [field, messages] of Object.entries(errors)) {
                messages.forEach(message => {
                    errorHTML += `<li>${message}</li>`;
                });
            }
        }
        
        errorHTML += '</ul>';
        errorContainer.innerHTML = errorHTML;
    }

    // // Login form submission
    // authForm?.addEventListener('submit', async function(e) {
    //     e.preventDefault();
    //     const submitBtn = document.getElementById('login-btn');
    //     const originalText = submitBtn.textContent;
    //     submitBtn.disabled = true;
    //     submitBtn.textContent = 'Logging in...';

    //     try {
    //         const response = await fetch('/login', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //             },
    //             body: JSON.stringify({
    //                 email: document.getElementById('login-email').value,
    //                 password: document.getElementById('login-password').value
    //             })
    //         });

    //         const data = await response.json();

    //         if (!response.ok) {
    //             throw data;
    //         }

    //         window.location.href = '/dashboard';

    //     } catch (error) {
    //         showErrors(error.errors || error.message || 'Login failed');
    //     } finally {
    //         submitBtn.disabled = false;
    //         submitBtn.textContent = originalText;
    //     }
    // });

    // Signup form submission
    // document.getElementById('signup-form')?.addEventListener('submit', async function(e) {
    //     e.preventDefault();
    //     const submitBtn = document.getElementById('signup-btn');
    //     const originalText = submitBtn.textContent;
    //     submitBtn.disabled = true;
    //     submitBtn.textContent = 'Registering...';

    //     try {
    //         const response = await fetch('/signup', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //             },
    //             body: JSON.stringify({
    //                 name: document.getElementById('signup-name').value,
    //                 email: document.getElementById('signup-email').value,
    //                 password: document.getElementById('signup-password').value,
    //                 password_confirmation: document.getElementById('signup-password-confirm').value
    //             })
    //         });

    //         const data = await response.json();

    //         if (!response.ok) {
    //             throw data;
    //         }

    //         window.location.href = '/verify-email';

    //     } catch (error) {
    //         showErrors(error.errors || error.message || 'Registration failed');
    //     } finally {
    //         submitBtn.disabled = false;
    //         submitBtn.textContent = originalText;
    //     }
    // });
});