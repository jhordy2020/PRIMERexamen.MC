document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector(".login-form");
    const messageContainer = document.createElement("div");
    messageContainer.style.marginTop = "10px";
    loginForm.appendChild(messageContainer);

    // Capturar el evento de envío del formulario
    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Evita la recarga de la página

        const username = document.querySelector("#txtusername").value.trim();
        const password = document.querySelector("#txtpassword").value.trim();

        if (!username || !password) {
            messageContainer.textContent = "Por favor, completa todos los campos.";
            messageContainer.style.color = "red";
            return;
        }

        try {
            // Enviar los datos al servidor usando fetch
            const response = await fetch(loginForm.action, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: new URLSearchParams({
                    txtusername: username,
                    txtpassword: password,
                }),
            });

            if (response.ok) {
                // Validar la redirección del backend
                const redirectedURL = response.url;
                if (redirectedURL.includes("claveequivocada.php")) {
                    messageContainer.textContent = "Usuario o contraseña incorrectos.";
                    messageContainer.style.color = "red";
                } else if (redirectedURL.includes("controladorDashboard.php")) {
                    messageContainer.textContent = "Login exitoso. Redirigiendo...";
                    messageContainer.style.color = "green";
                    setTimeout(() => {
                        window.location.href = redirectedURL;
                    }, 1000);
                }
            } else {
                throw new Error("Error en el servidor. Intenta de nuevo.");
            }
        } catch (error) {
            messageContainer.textContent = error.message;
            messageContainer.style.color = "red";
        }
    });

    // Opcional: funcionalidad para el botón "Remember"
    const rememberButton = document.querySelector(".remember-button");
    rememberButton.addEventListener("click", () => {
        alert("Funcionalidad de 'Recordar usuario' no implementada aún.");
    });
});
