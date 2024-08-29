export function emitirTurno() {
    const turno = document.getElementById('atendiendo_turno').getAttribute('txt_turno');
    const ventanilla = document.getElementById('atendiendo_turno').getAttribute('txt_ventanilla');
    const mensaje = `Turno ${turno}, acercarse a la ventanilla ${ventanilla} por favor.`;

    // Crear una instancia de SpeechSynthesisUtterance
    const utterance = new SpeechSynthesisUtterance(mensaje);

    // Opcional: Establecer propiedades adicionales
    utterance.lang = 'es-ES'; // Lenguaje español
    utterance.pitch = 1; // Tono
    utterance.rate = 1; // Velocidad

    // Emitir el mensaje
    window.speechSynthesis.speak(utterance);
}