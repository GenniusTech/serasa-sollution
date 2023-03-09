function openTab(tabName) {
    let i;
    let tabContent;
    
    tabContent = document.getElementsByClassName("tab-content");
    
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }
    
    document.getElementById(tabName).style.display = "flex";
}


// This needs to DRY'ed up so it can be used with a CMS
let consultaCpfEl = document.getElementById("consultaCpf");
let consultaCnpjEl = document.getElementById("consultaCnpj");

consultaCpfEl.addEventListener("click", function(){openTab("cpf")}, false);
consultaCnpjEl.addEventListener("click", function(){openTab("cnpj")}, false);