## Up and running this project

1. `git clone git@github.com:ibishek/code-assignment`
2. `cd code-assignment`
3. `cp .env.example .env`
4. `composer install`
5. `npm install`
6. `php artisan key:generate`
7. Create a database
8. Set database credentials in `.env`
9. Create a Github OAuth from Developer settings
10. Set OAuth Client Id in `.env > GITHUB_CLIENT_ID`
11. Generate and set OAuth Client Secret in `.env > GITHUB_CLIENT_SECRET`
12. `php artisan migrate`
13. `npm run dev`
14. `php artisan queue:listen`
15. Voilà, head back to your browser and enter `localhost:8000`
