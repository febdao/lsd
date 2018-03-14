# DFAT Innovation.

This is a Drupal 8 project which is based on govCMS distribution.

## govCMS compatibility

DFAT have govCMS projects on Drupal 7, so we're mindful of govCMS compatibility,
hence the use of the distribution.

So to stay compliant with a hypothetical govCMS Drupal 8 SaaS platform, this project
does not add any additional modules. It simply includes `"govcms/govcms": "~1.0"` in
composer.json. The outcome is a project structured the same was as if you followed
the installation instructions on https://github.com/govCMS/govCMS8.

There are other non-runtime components, like Drupal-VM for local development, and 
some standard test/build tools. These are not critical to govCMS and could be
removed, but they are unlikely to conflict with the govCMS Drupal 8 hosting platform.

## Local dependencies

 - Local PHP, git and [Composer](https://getcomposer.org/)
 - global [drush wrapper](https://github.com/drush-ops/drush-launcher/blob/master/README.md)
 - [vagrant](https://www.vagrantup.com/downloads.html)
 - [virtualBox](https://www.virtualbox.org/wiki/Downloads)
 - vagrant-hostupdater plugin: `vagrant plugin install vagrant-hostsupdater`
 - vagrant-auto_network: `vagrant plugin install vagrant-auto_network`
 
 ## Dev setup

Currently developing the theme locally. Updates to come.

 - `git clone https://github.com/TodayDesign/dfat-innovation`
 - `cd dfat-innovation`
 - `composer install`
 - `vagrant up`
 - `composer setup-local-settings`
 - `drush @vm site-install govcms`
 - `drush @vm user-login`

## Platform.sh access

(In progress)

Add your key to the project by logging into Platform.sh with the devops
user (see Team Password).

If you are using a custom key path (not id_rsa) then run:
`ssh-add path-to-your-key`

Login to platform locally with the devops user.
`platform auth:password-login`

Push changes to Platform.
`platform push`
    