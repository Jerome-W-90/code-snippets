#!/bin/sh

# ***********************************************************
#                     ETAPE 1 - INSTALLATION 
# ***********************************************************

## Installation de Homebrew via le script install.sh officiel et Homebrew Cask
echo 'Installation de Homebrew pour installer les packages'
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"

echo 'Vérification installation de Homebrew'
brew update

echo 'Installation de Cask pour installer les applications'
brew tap caskroom/cask

## Installation des applications et des packages...
echo 'Installation des packages de base...'
brew install node
brew install yarn
brew install mongodb/brew/mongodb-community
brew install git
brew install npm
brew install nano

echo 'Installation de React Native (Developpement MacOS / Target Android ) et ses dépendances...'
brew install react-native-cli
brew install watchman
brew cask install adoptopenjdk/openjdk/adoptopenjdk8

echo 'Installation des navigateurs Internet...'
brew cask install opera
brew cask install google-chrome
brew cask install firefox

echo 'Installation des applications pour le Développement Web...'
brew cask install mamp
brew cask install visual-studio-code
brew cask install sequel-pro
brew cask install docker
brew cask install robo-3t
brew cask install postman
brew cask install android-studio
brew cask install poedit

echo 'Installation des applications pour utilisation quotidienne...'
brew cask install istat-menus
brew cask install slack
brew cask install 1password
brew cask install google-backup-and-sync
brew cask install malwarebytes
brew cask install molotov
brew cask install nordvpn
brew cask install vlc
brew cask install discord
brew cask install macupdater
brew cask install microsoft-word
brew cask install microsoft-excel
brew cask install microsoft-powerpoint
brew cask install teamviewer

echo 'Installation de React JS...'
sudo npm install -g create-react-app

# ***********************************************************
#                    ETAPE 2 - CONFIGURATION 
# ***********************************************************

echo 'Activation de la recherche dans le DOSSIER_EN_COURS par défaut'
defaults write com.apple.finder FXDefaultSearchScope -string "SCcf"

echo 'Désactivation de la création automatique des fichiers .DS_STORE'
defaults write com.apple.desktopservices DSDontWriteNetworkStores -bool true
defaults write com.apple.desktopservices DSDontWriteUSBStores -bool true

echo 'Activation affichage des fichiers cachés'
defaults write com.apple.finder AppleShowAllFiles TRUE
echo 'Pour cacher affichage des fichiers cachés, tapez la même commande avec FALSE'

# ***********************************************************
#              ETAPE 2 - VARIABLE ENVIRONNEMENT 
# ***********************************************************

echo 'Mise en place des variables environnement pour Android Studio'
export ANDROID_HOME=$HOME/Library/Android/sdk
export PATH=$PATH:$ANDROID_HOME/emulator
export PATH=$PATH:$ANDROID_HOME/tools
export PATH=$PATH:$ANDROID_HOME/tools/bin
export PATH=$PATH:$ANDROID_HOME/platform-tools

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