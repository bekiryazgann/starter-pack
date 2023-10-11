let systemMessage = document.querySelector('#system-message');
if (systemMessage !== undefined) {
    setTimeout(() => {
        systemMessage.style.opacity = '0';
        setTimeout(() => {
            systemMessage.style.visibility = 'hidden';
        }, 500)
    }, 2000);
}