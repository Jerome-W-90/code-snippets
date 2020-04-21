# Utilisation des code snippets
### google_map_static.php
Permet de générer automatiquement une liste d'images de Google Map avec des données extraits d'une bdd (lat + long). Pour plus d'infos : https://developers.google.com/maps/documentation/maps-static/intro

### geolocalisation.html
Permet de récupérer les informations de localisations avec la fonction `getCurrentPosition()`. Il suffit simplement de lancer la page html.

### crypter_mdp_htpasswd.php
Permet de crypter un mot de passe pour éviter d'afficher le mot de passe en clair, comme dans la cadre d'un .htpasswd par exemple. Attention, la fonction crypt() produit un hash faible sans paramètre salt. Pour plus d'infos : https://www.php.net/manual/fr/function.crypt.php

# Utilisation des scripts
### config-new-mac.sh 
Ce script permet d'automatiser toute l'installation et la configuration sur un MacOS vierge, à savoir :
- Installation de Homebrew et npm pour pouvoir installer des packages (comme Node, Yarn, MongoDB... etc.)
- Installation de Homebrew Cask pour installer des applications (comme MAMP, Google Drive, Slack, Atom... etc.)
- Mise en place de la configuration par défaut du Mac (comme afficher par défaut les fichiers cachés, désactiver la création des fichiers .DS_STORE... etc.)
Pour lancer le script, ouvrir le terminal et tapez `bash config-new-mac.sh`

Pour voir la liste des `formulae` et des `cask` disponibles pour Homebrew ainsi que leur nom : 
- Formulae : https://formulae.brew.sh/formula/ 
- Cask : https://formulae.brew.sh/cask/

Pour voir la liste des packages npm ainsi que leur nom : https://www.npmjs.com

Pour contribuer à l'open source et ajouter un cask : https://github.com/Homebrew/homebrew-cask/blob/master/doc/development/adding_a_cask.md

# Utilisation des little apps
### calculatrice.html
WIP - Une calculette toute simple.
