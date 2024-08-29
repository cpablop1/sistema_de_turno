import { listarTurno } from "./listar.js";

window.onload = () => {
    setInterval(() => listarTurno(), 200);
}