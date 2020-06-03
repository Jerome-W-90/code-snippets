# Utilisation des code snippets
### google_map_static.php
Permet de générer automatiquement une liste d'images de Google Map avec des données extraits d'une bdd (lat + long). Pour plus d'infos : https://developers.google.com/maps/documentation/maps-static/intro

### geolocalisation.html
Permet de récupérer les informations de localisations avec la fonction `getCurrentPosition()`. Il suffit simplement de lancer la page html.

### crypter_mdp_htpasswd.php
Permet de crypter un mot de passe pour éviter d'afficher le mot de passe en clair, comme dans la cadre d'un .htpasswd par exemple. Attention, la fonction crypt() produit un hash faible sans paramètre salt. Pour plus d'infos : https://www.php.net/manual/fr/function.crypt.php

### chemin_absolu.php
Permet d'obtenir le chemin absolu d'où se trouve le fichier. Par exemple, mettre ce fichier dans le dossier htdocs de MAMP retournera : `Users/Example/Applications/MAMP/htdocs`. Pour plus d'infos : https://www.php.net/manual/fr/function.getcwd.php

### s3-aws-sdk-php
Permet l'utilisation de aws-sdk-php version 3+ pour stocker des fichiers sur le service de stockage en ligne S3.

-Etape 1 : Installer composer en global
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php --install-dir=/usr/local/bin --filename=composer

php -r "unlink('composer-setup.php');"

composer
```
-Etape 2 : Télécharger le sdk php `composer require aws/aws-sdk-php`

-Etape 3 : Remplacer les credentials, la region et le nom du bucket

-Etape 4 : Cliquer sur "choisir un fichier" et valider l'envoi du fichier sur le bucket S3 d'AWS

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
