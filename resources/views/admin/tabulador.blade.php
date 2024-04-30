<!-- tabulador.blade.php -->
<div class="tabulador">
    <button class="tablink active" onclick="openTab(event, 'vista1')">Gestión de empresas ofertantes</button>
    <button class="tablink" onclick="openTab(event, 'vista2')">Gestion de rubros</button>
    <button class="tablink" onclick="openTab(event, 'vista3')">Gestion de clientes</button>

    <div id="vista1" class="tabcontent" style="display: block;">
        <!-- Contenido de la Vista 1 -->
        a
    </div>

    <div id="vista2" class="tabcontent" style="display: none;">
        <!-- Contenido de la Vista 2 -->
        b
    </div>

    <div id="vista3" class="tabcontent" style="display: none;">
        <!-- Contenido de la Vista 3 -->
        c
    </div>
</div>

<script>

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


document.addEventListener("DOMContentLoaded", function() {
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
});
</script>
