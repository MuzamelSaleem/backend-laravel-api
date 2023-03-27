#### Docker

**To start the server:**

1.  Install [Docker Desktop](https://www.docker.com)


2.  Open up a shell to the root of the `backend-laravel-api` application
    Run the following commands:

        $ cp .env.example .env      # be sure to change anything that's specific to your env first

3.  Open `./docker-compose.yml` and update the port bindings as needed to avoid conflicts on your  system.

    -   If you change the port away from 8000, update `APP_URL` and `MIX_BROWSERSYNC_PROXY` in `.env` appropriately

4.  Simply run `docker-compose up --build` in the root directory to spin up all the necessary
    containers.

**To open up a shell on the server:**

1.  `$ docker-compose exec app /bin/sh`

    $ ./artisan migrate


after run the migration successfully goto the react-new-app and follow the instructions for run the front-end site too.


