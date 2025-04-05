
// aba filmes e series botão de voltar ao topo
const btnTopo = document.getElementById("btnTopo");
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        btnTopo.style.display = "block";
    } else {
        btnTopo.style.display = "none";
    }
};

btnTopo.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
