# CalendMap

Calendmap is a project of merging calendar and map tools.

Please don't forget to remove your IDE files from your .gitignore global.

@work in progress


## Developers

1. Clone the project `git clone git@github.com:petegore/calendmap.git`
2. Run `docker-compose build` then `docker-compose up -d`
3. Add the line t your hosts file : `127.0.0.1    calendmap.local`
4. Run composer : `docker exec -it -u www-data -w /var/www/symfony calendmap-php /bin/bash -c "composer install"`
5. Create your feature branch `git checkout -b feature/my-feature develop`
6. Always follow the Gitflow Workflow
7. Enjoy !