function mostrar(){
    document.getElementById('mujer').style.display = "flex";
    document.getElementById('hombre').style.display = "flex";
    document.getElementById('niños').style.display = "flex";
    document.getElementById('bebes').style.display = "flex";
}

function mostrar1(){
    document.getElementById('mujer').style.display = "flex";
    document.getElementById('hombre').style.display = "none";
    document.getElementById('niños').style.display = "none";
    document.getElementById('bebes').style.display = "none";
}

function mostrar2(){
    document.getElementById('mujer').style.display = "none";
    document.getElementById('hombre').style.display = "flex";
    document.getElementById('niños').style.display = "none";
    document.getElementById('bebes').style.display = "none";
}

function mostrar3(){
    document.getElementById('mujer').style.display = "none";
    document.getElementById('hombre').style.display = "none";
    document.getElementById('niños').style.display = "flex";
    document.getElementById('bebes').style.display = "none";
}

function mostrar4(){
    document.getElementById('mujer').style.display = "none";
    document.getElementById('hombre').style.display = "none";
    document.getElementById('niños').style.display = "none";
    document.getElementById('bebes').style.display = "flex";
}

function updateDropdown(option) {
    const dropdownButton = document.getElementById("dropdownButton");

    dropdownButton.textContent = `Ordenar por: ${option} ↓`;
}

