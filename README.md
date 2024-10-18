# Laravel Photo Gallery Processing

## Clone the Repository

Run the Command
`composer install`
### Create .env file
create the database and add to .env file

Run the `php artisan key:generate` to generate the key

Run the `php artisan migrate`to migrate database

Run th `php artisan storage:lnik` to make alias of storage folder on public directory ( bofore running this cmd , run first `rmdir public\storage`

## Lunch the Application with 
`php artisan serve`

## Cette application permet à son utilisateur après authentification de :
### Premiere Partie :
✔ Charger(upload)/télécharger/supprimer une image ou un ensemble d'images
✔ Organiser les images sous forme d'une hiérarchie de thèmes
✔ Permettre de créer des nouvelles images  par application de certaines transformations aux images existantes ( crop, changement d'échelle ...)
✔ Consommer des services d'une Rest API écrite sous python, à l'aide du microframework  Flask et de son extension Flask Restful. Ces services permettent de calculer certains descripteurs de contenu d'une image ou d'un ensemble d'images. Il s'agit içi des descripeurs de couleur suivants : Histogrammes de couleur, moments de couleur et couleurs dominantes.
✔ Afficher sous une forme convenable les descripteurs calculés pour une image donnée.
### Deuxieme Partie: deux stratégies de recherche par le contenu
✔ recherche d’images par le contenu sans retour de pertinence.  
❌ recherche d’images par le contenu avec retour de pertinence.  
## Enjoy ❤
