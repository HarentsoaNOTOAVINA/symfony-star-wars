## Star wars application

- php version : 8.1
- symfony version: 6.2


## Context
This is a star-wars project consuming API from SWAPI API :
<a href="https://swapi.dev/documentation">Ici</a>

## Goals
- Making template to show  informations about tte ame sta wars inside SWAPI API
- Make filter to search for movies, peoples inside the game


## Steps for installation and

### Using local server
1. clone the project from repository
2. cd to /project_directory
3. run command 
      $composer install
4. run command 
    - $symfony serve, if you're using symfony CLI
    - $php bin/console server:start
   => navigate to the url given bellow

### Using docker
1. clone the project from repository
2. cd to /project_directory
3. copy docker-compose.override.yml.backup to docker-compose.override.yml
4. run command 
      $docker compose up -d
5. run command 
      $docker compose build
6. for plugins installation and assets, run command: 
      $docker exec -it www_star bash
7. run command with the bash given
      $ cd star-wars
      $ composer install
8. navigate to : http://star-wars.loc/ 

You're done :) 


### docker config and specification
 host : http://star-wars.loc:port/
 => config file is inside /build/vhost.conf


## Ultras
- ! For te template, I used a twi extension to get a template to used before 
- Rename env.local.backup to env.local and insert te url I ave you inside your mail address for the view