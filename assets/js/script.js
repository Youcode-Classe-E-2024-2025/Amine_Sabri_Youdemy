setTimeout(() => {
    const messageElement = document.getElementById('message');
    if (messageElement) {
        messageElement.style.display = 'none';
    }
}, 2000); 


// validation de form regester
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let username = document.getElementById('username').value.trim();
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    let roleId = document.getElementById('role_id').value;

    let errors = [];
    if (username.length < 3) {
        errors.push("Le nom d'utilisateur doit contenir au moins 3 caractères.");
    }
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        errors.push("Veuillez entrer une adresse email valide.");
    }
    if (password.length < 6) {
        errors.push("Le mot de passe doit contenir au moins 6 caractères.");
    }
    if (!roleId) {
        errors.push("Veuillez sélectionner un rôle.");
    }
    if (errors.length > 0) {
        e.preventDefault(); 

        let errorMessage = errors.join("\n");
        alert(errorMessage);
    }
});