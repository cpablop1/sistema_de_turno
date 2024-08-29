let audioContext;

export function emitirPitido() {
	// Crear el contexto de audio si aún no se ha creado
	if (!audioContext) {
		audioContext = new (window.AudioContext || window.webkitAudioContext)();
	}

	// Reanudar el contexto de audio si está suspendido
	if (audioContext.state === 'suspended') {
		audioContext.resume();
	}

	// Crear un oscilador
	const oscillator = audioContext.createOscillator();

	// Establecer el tipo de onda y la frecuencia del oscilador
	oscillator.type = 'sine'; // Puedes cambiar esto a 'square', 'sawtooth', o 'triangle'
	oscillator.frequency.setValueAtTime(440, audioContext.currentTime); // 440 Hz es la frecuencia de un A4

	// Conectar el oscilador al destino (los altavoces)
	oscillator.connect(audioContext.destination);

	// Iniciar el oscilador
	oscillator.start();

	// Detener el oscilador después de 1 segundo
	setTimeout(() => {
		oscillator.stop();
	}, 1000);
}