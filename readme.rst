###################
What is CI-Template
###################

CI-Template is a bundled package of several application development tools:
    1) CodeIgniter 3.06
    2) Bootstrap 3.36
    3) Ion-auth 2 (login/authentication module)
    4) kenjis'ci-phpunit-test (integrates PHPUnit with CodeIgniter 3.x) v 11.1

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `bitbucket.org/chuck_savino Downloads
<http://bitbucket.org/chuck_savino>`_ page and look for ci-template downloads.


*******************
Server Requirements
*******************

PHP version 5.4 or newer is recommended.If you want to use PHPUnit, you must 
have PHP 5.6 or greater installed, and PHPUnit 5.2.9 or greater.

The rest of my dev environment is:
    1)  Linux: Ubuntu 14.04 LTS
    2)  Apache: 2.4.7
    3)  Mysql:  5.5
    4)  Netbeans: 8.1


************
Installation
************

1)  Copy the files from this package into a new directory on your web server.
2)  In application/config/config.php change the 'base_url' to point to the new 
    folder you just created on your webserver using your domain. Also, update
    the 'cookie_domain' config variable to point to your domain or you will
    have issues with maintaining info stored in session variables (like logins).
3)  Create a new mysql db, update application/config/database.php
    to point to your new db and set the login credentials. I named my db the same 
    as the new directory I created in step 1: tracker. If you use my tadmin 
    user, be sure to both create it in mysql and grant it all privileges in the new db.
4)  To populate the design and the initial data in your new db, navigate to the 
    application/resources/bootstrap_auth/sql folder on your web server, start a 
    MySql command line session and run the ion_auth.sql file 
    (source ion_auth.sql). You may need to sudo the command to get permission 
    to run it. The default login username/password is admin@admin.com/password
5)  Note that I changed the default Ion-auth behavior for remembering logins. 
    When a user closes their browser they are automatically logged out. If you 
    want to keep users logged in until they click the logout button, change
    $config['remember_users'] to TRUE in application/config/ion_auth.php.
6)  The native 3.04 Codeigniter cross-site request forgery prevention is enabled.
    The application/config/config.php variable 'csrf_protection' is set to TRUE.
    csrf protection will be handled automatically if you use form_open in the Form
    Helper. If not using the Form Helper on a form, please refer to the CI 3.0 doc 
    to learn how to enable it for csrf protection manually or your form will not 
    submit.
*******
License
*******

Same as the Codeigniter `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `Codeigniter User Guide <https://codeigniter.com/docs>`_
-  `Ion-auth User Guide <http://benedmunds.com/ion_auth>`_


