# Challenge PHP Meteo

L'objectif est que le programme :

* Demande à l'utilisateur de saisir une ville
* Fasse une requête auprès de l'API OpenWeatherMap
* Affiche la météo correspondante

# Dépendances

Pour charger les informations sensibles depuis un fichier .env

```bash
composer require vlucas/phpdotenv
```

# Ressources

## OpenWeatherMap
    
Il est nécessaire de créer un compte sur OpenWeatherMap et demander une clé API
https://openweathermap.org/api

## Effectuer une requête en PHP CLI

Avec **file_get_contents()**:

``file_get_contents( $url );``

Avec **curl()**


# Amélioration / Points à prévoir

* Gestion des erreurs
  * Mauvaise saisie de l'utilisateur
  * Stockage de la clé API en variable d'environnement
  * Accès impossible à l'API OpenWeatherMap
  * Ville inexistante sur OpenWeatherMap