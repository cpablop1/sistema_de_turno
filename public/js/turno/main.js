import listarTurno from "./listar.mjs";

window.onload = () => {
    setInterval(() => listarTurno(), 200);
}