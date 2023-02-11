// Classe de chargement des images
// Ajouter les images par add et lancer le chargement par start
// Passer à start la fonction à appeler quand tout a été chargé
function imgLoader() {
    this.lstImages = [];
    var lstFiles = [];
    var loadedImageCount = 0;
    var callback;

    // Simple ajout à une liste
    this.add = function (pImageFile) {
        lstFiles.push(pImageFile);
        console.log("Added image " + pImageFile + " / Total images: " + this.lstImages.length);
    }

    // Parcoure la liste des fichiers et crée un objet image (encapsulé dans un imgAsset)
    // Et appelle imageLoaded quand l'image est chargée
    // pCallback : la fonction à appeler quand tout aura été chargé
    this.start = function (pCallback) {
        callback = pCallback;
        for (var i = 0; i < lstFiles.length; i++) {
            var img = new Image();
            img.onload = imageLoaded;
            img.src = lstFiles[i];
            this.lstImages[lstFiles[i]] = img;
        }
    }

    // callback (donc statique) quand une image s'est chargée
    // calcule si on a chargé toutes les images et si oui, appelle "callback"
    imageLoaded = function (e) {
        loadedImageCount++;
        console.log("Loaded images " + loadedImageCount + "/" + lstFiles.length);
        if (loadedImageCount >= lstFiles.length) {
            console.log("All loaded!");
            callback();
        }
    }

    // Permet d'aller chercher l'objet imgAsset attaché au nom de fichier passé en paramètre
    // renvoie null si l'image n'existe pas
    this.getImage = function (pFileName) {
        return this.lstImages[pFileName];
    }
}

