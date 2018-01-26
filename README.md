# CalendMap

Calendmap is a project of merging calendar and map tools.

Please don't forget to remove your IDE files from your .gitignore global.

@work in progress


## Developers

1. Clone the project `git clone git@github.com:petegore/calendmap.git`
2. Create a MySQL env file with your credentials into `/docker/mysql/mysql.env`
3. Run `docker-compose build` then `docker-compose up -d`
4. Add the line t your hosts file : `127.0.0.1    calendmap.local`
5. Run composer : `docker exec -it -u www-data -w /var/www/symfony/app calendmap-php /bin/bash -c "composer install"`
6. Create your feature branch `git checkout -b feature/my-feature develop`
7. Always follow the Gitflow Workflow
8. Enjoy !