//Obtener la pantalla de rotate
let portraitAlert = document.getElementById('portraitAlert');
let gameCanvas = document.querySelector("#unity-canvas");



// Estableciendo tamaño
if (window.innerHeight > window.innerWidth) {
    portraitAlert.style.width = `${window.innerWidth}px`;
    portraitAlert.style.height = `${window.innerHeight}px`;
}

//Viendo si cambia de orientacion
window.addEventListener("orientationchange", function() {
    if (window.innerHeight > window.innerWidth) {
        portraitAlert.style.width = `${window.innerWidth}px`;
        portraitAlert.style.height = `${window.innerHeight}px`;
    }
      
    
}, false);
