A meme website with subscribers.
This will be the docs for when I forget stuff.
Increasing the bus factor.

Fixing permissions for /storage

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


Finding what apache is running as
    ps aux | egrep '(apache|httpd)'

Xdebug tracing

    php -d xdebug.auto_trace=ON -d xdebug.trace_output_dir=mytracedir/ myscript.php

DB transfer

    http://dubbs.github.io/blog/2013/09/05/mysql-import-slash-export-progress-bar/

the mysql and mysqldump -h option allow to specify remote server