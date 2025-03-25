console.log('Submitting:', {
    name: document.getElementById('signup-name').value,
    email: document.getElementById('signup-email').value,
    password: document.getElementById('signup-password').value
});

fetch('/signup', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        name: document.getElementById('signup-name').value,
        email: document.getElementById('signup-email').value,
        password: document.getElementById('signup-password').value,
        password_confirmation: document.getElementById('signup-password-confirm').value
    })
})
.then(response => response.json())
.then(data => console.log('Response:', data))
.catch(error => console.error('Error:', error));