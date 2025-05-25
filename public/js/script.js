function toggleFiltros() {
        const filtros = document.getElementById("filtro");
        filtros.style.display = filtros.style.display === "none" ? "block" : "none";
      }

document.addEventListener("DOMContentLoaded", function () {
  const mensagens = document.querySelectorAll(".mensagem-flash");

  mensagens.forEach((mensagem) => {
    setTimeout(() => {
      mensagem.style.opacity = "0";
      setTimeout(() => {
        mensagem.remove();
      }, 1000);
    }, 3000); 
  });
});