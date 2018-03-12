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

## Dev setup

 - `git clone https://github.com/TodayDesign/dfat-innovation`
 - `cd dfat-innovation`
 - `composer install`
 - `vagrant up`
 - `composer install-worksafe` # Sets up settings files and installs a stub db.
 
