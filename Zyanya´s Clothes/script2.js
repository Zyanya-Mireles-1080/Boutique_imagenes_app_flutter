function updateDropdown2(option) {
    const dropdownButton = document.getElementById("dropdownButton2");

    dropdownButton.textContent = `Ver por: ${option} ↓`;
}

function mostrar5(){
    document.getElementById('productos').style.display = "flex";
    document.getElementById('categoria').style.display = "none";
    document.getElementById('clientes').style.display = "none";
    document.getElementById('pedidos').style.display = "none";
    document.getElementById('empleados').style.display = "none";
    document.getElementById('proveedores').style.display = "none";
}

function mostrar6(){
    document.getElementById('productos').style.display = "none";
    document.getElementById('categoria').style.display = "flex";
    document.getElementById('clientes').style.display = "none";
    document.getElementById('pedidos').style.display = "none";
    document.getElementById('empleados').style.display = "none";
    document.getElementById('proveedores').style.display = "none";
}

function mostrar7(){
    document.getElementById('productos').style.display = "none";
    document.getElementById('categoria').style.display = "none";
    document.getElementById('clientes').style.display = "flex";
    document.getElementById('pedidos').style.display = "none";
    document.getElementById('empleados').style.display = "none";
    document.getElementById('proveedores').style.display = "none";
}

function mostrar8(){
    document.getElementById('productos').style.display = "none";
    document.getElementById('categoria').style.display = "none";
    document.getElementById('clientes').style.display = "none";
    document.getElementById('pedidos').style.display = "flex";
    document.getElementById('empleados').style.display = "none";
    document.getElementById('proveedores').style.display = "none";
}

function mostrar9(){
    document.getElementById('productos').style.display = "none";
    document.getElementById('categoria').style.display = "none";
    document.getElementById('clientes').style.display = "none";
    document.getElementById('pedidos').style.display = "none";
    document.getElementById('empleados').style.display = "flex";
    document.getElementById('proveedores').style.display = "none";
}

function mostrar10(){
    document.getElementById('productos').style.display = "none";
    document.getElementById('categoria').style.display = "none";
    document.getElementById('clientes').style.display = "none";
    document.getElementById('pedidos').style.display = "none";
    document.getElementById('empleados').style.display = "none";
    document.getElementById('proveedores').style.display = "flex";
}