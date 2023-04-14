
document.getElementById("username").addEventListener("keydown", function (e) {
            const txt = this.value;
            if ((txt.length == 10 || e.which == 32) & e.which !== 8) e.preventDefault();
            if ((txt.length == 2 || txt.length == 6) && e.which !== 8)
                this.value = this.value + ".";
        });
        document.forms[0].addEventListener("submit", e => {
            e.preventDefault();
            const dni_usuario = e.target.elements["dni_usuario"];
            dni_usuario.value = dni_usuario.value.replaceAll(" ", "");
            console.log(dni_usuario.value);
        });