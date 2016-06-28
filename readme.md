# ekosme.me
#####Badges
[![StyleCI](https://styleci.io/repos/25037330/shield)](https://styleci.io/repos/25037330)

A meme website with subscribers.
This file, readme.md will be the docs for when I forget stuff.
Increasing the bus factor.

## Installation

1. Clone repo
2. Fill in .env file
3. Setup permissions for storage folder
4. Run migrations/import database

## Usage

Keep bringing this "weekend project" up to some standards

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

This project started out as a quick mvp back in October 2010.
The first idea was to share funny images/memes with my schoolmates,
because the school jokes ("Tekstasy") gathered in the school newspaper
("Ekosik") became increasingly unfunny. It was to have snapchat-like
functionality, so that the image would disappear after 30sec.
But then people were taking screenshots anyway, so I decided
to just keep on doing what it did best - sharing images by mail
to a closed group of subscribers.

## Credits

Marcin Lawniczak

Filip Perz
Kuba Marszałikewicz

## License

This code is licensed under MIT license. See license.md for more details.

## Various knowledge bits to clean up

####Fixing permissions for /storage

    http://stackoverflow.com/a/22192814

I think chmod -777 is a bad practice.

To solve permissions issue on Laravel, I've done this (with root user):

    cd app/
    chown -R www-data:www-data storage
    cd storage/
    find . -type d -exec chmod 775 {} \; && find . -type f -exec chmod 664 {} \;
    And always in app/storage directory :
    chown your_user:user_group .gitignore cache/.gitignore logs/.gitignore meta/.gitignore sessions/.gitignore views/.gitignore

Now, exit the root user, and it's ok.
EDIT : this was for Laravel4. This doesn't works for Laravel5 because of a different structure.

####Finding what apache is running as

    ps aux | egrep '(apache|httpd)'

####Xdebug tracing

    php -d xdebug.auto_trace=ON -d xdebug.trace_output_dir=mytracedir/ myscript.php

####DB transfer

    http://dubbs.github.io/blog/2013/09/05/mysql-import-slash-export-progress-bar/

the mysql and mysqldump -h option allow to specify remote server

####Running php server

    php -S localhost:8000 -t public public/index.php
    
####Tests namespacing
    https://laracasts.com/discuss/channels/testing/using-namespace-with-laravels-testcase-integrated-testing