document.getElementById('reset-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    try {
        const response = await fetch('/forgot-password', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                email: document.getElementById('reset-email').value
            })
        });

        const data = await response.json();
        
        if (response.ok) {
            alert(data.message);
        } else {
            alert(data.error || 'Failed to send reset link');
        }
    } catch (error) {
        alert('Network error - please try again');
    }
});