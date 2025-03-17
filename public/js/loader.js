document.addEventListener("DOMContentLoaded", function () {
    console.log("Loader JS chargé !");

    window.showUniverseLoader = function () {
        const universeLoader = document.getElementById("universe");

        if (universeLoader) {
            console.log("Affichage du loader...");
            universeLoader.style.display = "flex"; // Montre le loader

            // Masquer après 2 secondes
            setTimeout(() => {
                console.log("Masquage du loader...");
                universeLoader.style.display = "none";
            }, 2000);
        } else {
            console.error("Élément #universe introuvable !");
        }
    };
});
