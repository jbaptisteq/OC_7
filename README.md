# OpenClassroom - PHP/Symphony Developer
# Project 7 _ Créez un web service exposant une API

## Link of the Path
 ```
 https://openclassrooms.com/paths/59-developpeur-dapplication-php-symfony
 ```

 ## Quality Test :

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b4449206937143ba8ec3626d4a4e2b19)](https://www.codacy.com/app/jbaptisteq/OC_7?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jbaptisteq/OC_7&amp;utm_campaign=Badge_Grade)

 PhPUnit Test present in tests folder:
 ```
 #!/usr/bin/env php
 PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

 Testing Project Test Suite
 ........                                                            8 / 8 (100%)

 Time: 327 ms, Memory: 4.00MB

 [30;42mOK (8 tests, 8 assertions)
 ```

 ## Languages used :
   html 5, CSS 3, PHP, MySQL

 ## Frameworks :
   symfony 4.1

 ## Getting Started :
    These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

 ## Prerequisites :
    For Windows you need a web development environment, like wampServer.
    Link and installation instructions available here
    ```
    http://www.wampserver.com/en/
    ```

 ## Installing :
   Clone project or Download and unzip on your folder choice this repository
   ```
   https://github.com/jbaptisteq/OC_7/archive/master.zip
   ```

   Download and execute Composer in project folder for install Requirements
   ```
   https://getcomposer.org/
   php /path/to/composer.phar update
   ```

   Go to Project Root Folder
   Execute First line for checking database creation.
   Execute second line for create database
   ```
   php bin/console doctrine:schema:update  --dump-sql
   php bin/console doctrine:schema:update  --force
   ```

   Adding first data with Fixtures bundle
   ```
   php bin/console doctrine:fixtures:load
   Careful, database will be purged. Do you want to continue Y/N ?y
   ```

   You can also manually create a new database, import oc7_jbq.sql on your database for install with a demo-version dataset.

   Open file .env and use your own access
   ```
   ###> doctrine/doctrine-bundle ###
   # Format described at http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
   # For an SQLite database, use: "sqlite:///%kernel.project_dir%/var/data.db"
   # Configure your db driver and server_version in config/packages/doctrine.yaml
   DATABASE_URL=mysql://yourUser:YourPassword@yourIP/YourDataBase
   ###< doctrine/doctrine-bundle ###
   ```

   You can now run application server :
   ```
   php bin/console server:run
   ```


   This dataset have all password set on the word :
   ```
   test
   ```

   Ressources List
   ```
   /api  (API Documentation, No Firewall Anonymous authorized)
   /api/products  (GET : Get list of all products)
   /api/products/{id}  (GET : Get product detail for id)
   /api/users  (GET : Retrieve list of user for current client)
   /api/users  (POST : Create user for current client)
   /api/users/{id}  (GET : Get user detail for id)
   /api/users/{id}  (DELETE : Delete user for id)
   ```

   Security
   ```
   This project use LexikJWTAuthenticationBundle
   https://github.com/lexik/LexikJWTAuthenticationBundle
   The token need to be in each request except login_check.
   Use POST request on /login_check route to get your token with body {"username":"****","password":"test"}
   ```

   Docs
   ```
   Diagrams\List.md
   ```

  ## Built with
  * [ATOM](https://atom.io/) - Code
  * [WAMP](http://www.wampserver.com/en/) - Database management
