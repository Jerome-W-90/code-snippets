#!/bin/sh

# ***********************************************************
#                     ETAPE 1 - INSTALLATION 
# ***********************************************************

## Installation de Homebrew via le script install.sh officiel
echo 'Installation de Homebrew pour installer les packages'
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"

## Vérification si Homebrew est bien installé
echo 'Vérification de Homebrew et installation de Cask pour installer les applications'
brew update 
brew tap caskroom/cask
echo 'Homebrew et Cask sont bien installés'

## Installation des packages brew
echo 'Installation des packages brew...'
brew install node yarn mongodb/brew/mongodb-community git npm
echo 'Installation des packages terminée'

## Installation des applications
echo 'Installation des applications...'
brew cask install mamp visual-studio-code sequel-pro istat-menus docker opera google-chrome firefox slack 1password robo-3t google-backup-and-sync
echo 'Installation des applications terminée'

## Installation des packages npm en global
echo 'Installation des packages npm en global...'
sudo npm install -g create-react-app react-native-cli
echo 'Installation des packages npm terminé'

# ***********************************************************
#                    ETAPE 2 - CONFIGURATION 
# ***********************************************************

# Recherche dans le dossier en cours par défaut
echo 'Activation de la recherche dans le DOSSIER_EN_COURS par défaut'
defaults write com.apple.finder FXDefaultSearchScope -string "SCcf"

# Pas de création de fichiers .DS_STORE
echo 'Désactivation de la création des fichiers .DS_STORE'
defaults write com.apple.desktopservices DSDontWriteNetworkStores -bool true
defaults write com.apple.desktopservices DSDontWriteUSBStores -bool true

# Montrer les fichiers cachés
echo 'Activation affichage des fichiers cachés'
defaults write com.apple.finder AppleShowAllFiles TRUE
echo 'Pour cacher affichage des fichiers cachés, tapez la même commande avec FALSE'

# ***********************************************************
#                ETAPE 3 - FIN DE L'INSTALLATION 
# ***********************************************************

echo 'Rechargement du Finder et du Dock'
killall Dock
killall Finder

echo 'Nettoyage du cache Homebrew'
brew cleanup
rm -f -r /Library/Caches/Homebrew/*

echo 'SCRIPT terminé'