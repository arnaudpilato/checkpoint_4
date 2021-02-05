# checkpoint_4
Dernier checkpoint de la formation à la Wild Code School

Réaliser avec le framework Symfony

# Prérequis

Php v^7.4
Yarn v^1.22
Composer v^2

# Installation
1 : Cloner le repository : 	        
https://github.com/arnaudpilato/checkpoint_4.git

2 : Créér un fichier .env.local à la racine du projet, puis décommentez dans ce fichier la ligne suivante:

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
(à compléter par vos soins)

###> symfony/mailer ###
MAILER_DSN= (Vous pourrez simuler des envois d’E-mail avec le service mailtrap :https://mailtrap.io/ )
MAILER_FROM_ADDRESS= (Votre adresse pour envoyer les E-mail)
MAILER_TO_ADDRESS= (Votre adresse pour recevoir les E-mail)
###< symfony/mailer ###

3 : Composer install :
    Une fois composer installé, lancez dans votre terminal à la racine du projet “composer install” pour installer les 
    librairies requises pour faire fonctionner le projet.

4 : yarn install :
    Une fois Yarn installé, lancez dans votre terminal à la racine du projet 
    “yarn install” pour installer les fichiers requis pour faire fonctionner le projet.

5 : symfony console doctrine:database:create :
    Une fois que vous avez rempli le fichier env.local, lancez dans votre terminal à la racine du projet 
    “symfony console doctrine:database:create” en y entrant le nom que vous avez choisi pour votre base de donnée qui se 
    trouve dans le env.local.

6 : symfony console doctrine:migrations:migrate :
    Une fois que la base de donnée est créée, lancez dans votre terminal à la racine du projet 
    “symfony console doctrine:migrations:migrate” pour remplir la base de données de ses tables.
                     
7 : yarn encore dev :
	lancez dans votre terminal à la racine du projet “yarn encore dev” pour mettre
	à jour votre build et les fichiers de style, ainsi que les images du projet.

8 : symfony server:start :
	enfin, lancez “symfony server:start” pour ouvrir votre localhost dans votre
	navigateur.
  
9 : Enjoy!!!
