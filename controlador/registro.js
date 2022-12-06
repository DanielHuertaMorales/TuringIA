/*El controlador recuada la información del formulario para ser utilizada en registrar.php*/
$("#form-registro").submit(async function (e) {
    e.preventDefault();
    
    let nombre = e.target.nombre.value;
    let correo = e.target.correo.value;
    let telefono = e.target.telefono.value;
    let mensaje = e.target.mensaje.value;

    /**/
    try {
        let url = "/TuringIA/controlador/registrar.php"
        let { data: result } = await axios.post(url, {
            nombre,
            correo,
            telefono,
            mensaje,
        });
        alert(`Su mensaje ha sido enviado correctamente, nos pondremos en contacto.`)
        location.href = "/TuringIA/vista/index.html";
    } catch (error) {
        if(error.response) {
            let err = error.response.data
            if(err.code == 1062) {
                alert("Ha habido un error al enviar tu mensaje");
                return
            }
            return;
        }
        alert("Parece que tienes problemas de conexión, intenta de nuevo más tarde.")
        
    }
});
