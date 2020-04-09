# Utilisation des code snippets
### google_map_static.php
Permet de générer automatiquement une liste d'images de Google Map avec des données extraits d'une bdd (lat + long). Pour plus d'infos : https://developers.google.com/maps/documentation/maps-static/intro.

### geolocalisation.html
Permet de récupérer les informations de localisations avec la fonction `getCurrentPosition()`. Il suffit simplement de lancer la page html.

# Utilsation des scrips
### config-new-mac.sh 
Ce script permet d'automatiser toute l'installation et la configuration sur un MacOS vierge, à savoir :
- Installation de Homebrew et npm pour pouvoir installer des packages (comme Node, Yarn, MongoDB... etc.)
- Installation de Homebrew Cask pour installer des applications (comme MAMP, Google Drive, Slack, Atom... etc.)
- Mise en place de la configuration par défaut du Mac (comme afficher par défaut les fichiers cachés, désactiver la création des fichiers .DS_STORE... etc.)
Pour lancer le script, ouvrir le terminal et tapez `bash config-new-mac.sh`

Avant de lancer le script :
- Ligne 19 : supprimer les packages non voulus et ajouter les packages souhaités en vérifiant la disponibilité et le nom sur https://formulae.brew.sh/formula/ 
- Ligne 24 : supprimer les applications non voulues et ajouter les applications souhaitées en vérifiant la disponibilité et le nom sur https://formulae.brew.sh/cask/
- Ligne 29 : supprimer les packages npm non voulus et ajouter les packages npm voulus en vérifiant la disponibilité et le nom sur https://www.npmjs.com
- Dans la partie CONFIGURATION, supprimer le(s) bloc(s) non souhaité(s)