// Função para validar o formulário de login
function validateForm() {
    const password = document.querySelector('input[name="password"]').value;
    
    if (password.length < 6) {
        alert('A senha deve ter pelo menos 6 caracteres.');
        return false;
    }
    
    return true;
}

