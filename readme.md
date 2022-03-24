# Symfomy TD 

## commande de line

# Creation de

Version = 4.4
```bash
Create projet : create-project symfony/website-skeleton NomduProjetSymfony "4.4.*" 
```
### Lastest version

```
create-project symfony/website-skeleton NomduProjet
```
### Create controller
```
php bin/console  make:controller NomController
```

### Config BDD

```
DATABASE_URL="mysql://dev:root@127.0.0.1:3306/miaw_projet?serverVersion=5.7&charset=utf8mb4"
```

## Entite 

Créer l’entité : 

```
php bin/ console make:entity
```
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```


### Création Base de donnes : 
```
CREATE DATABASE 'miaw_projet'; 
```
Créer un user : 
```
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'root'
```
Donner accès
```
GRANT ALL PRIVILEGES ON miaw_projet.* TO 'dev'@localhost'%' WITH GRANT OPTION;
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
Copyright &copy; Muthuvel  