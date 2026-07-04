document.addEventListener("DOMContentLoaded", function () {

    const checkboxes = document.querySelectorAll(".select-tarea");
    const btnEliminar = document.getElementById("btn-eliminar");
    const formEliminar = document.getElementById("form-eliminar");
    const inputHidden = document.getElementById("id_tarea");

    function actualizarSeleccion() {

        const seleccionadas = [...checkboxes].filter(cb => cb.checked);

        btnEliminar.disabled = seleccionadas.length !== 1;

        inputHidden.value =
            seleccionadas.length === 1
                ? seleccionadas[0].value
                : "";
    }

    checkboxes.forEach(cb =>
        cb.addEventListener("change", actualizarSeleccion)
    );

    // Estado inicial
    actualizarSeleccion();

    formEliminar.addEventListener("submit", function (event) {

        if (inputHidden.value === "") {
            event.preventDefault();
            alert("Selecciona una tarea para eliminar.");
            return;
        }

        const confirmar = confirm(
            "¿Estás seguro de que deseas eliminar esta tarea?"
        );

        if (!confirmar) {
            event.preventDefault();
        }

    });

});