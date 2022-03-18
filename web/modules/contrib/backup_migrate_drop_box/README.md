# Backup and Migrate: Dropbox

This module allows for any Dropbox storage to be used as a destination
for Backup and Migrate files.

## Requirements ##

Modules required:
- [Backup and Migrate](https://www.drupal.org/project/backup_migrate)
- [Key](https://www.drupal.org/project/key)

## Installation

It is suggested that you install using Composer.

```bash
cd /path/to/drupal/root
composer require drupal/backup_migrate_drop_box
drush en backup_migrate_drop_box
```

## Configuration ##

1. Using the Key module, set up your access keys. Keys can
   be managed at (**/admin/config/system/keys**)

2. Visit the Backup and Migrate Destinations settings page
   (**/admin/config/development/backup_migrate/settings/destination**)

3. Add a new Backup Destination and choose "Dropbox" as the type.

4. Configure and select the keys configured earlier.

5. Now you are ready to start sending your backups to Dropbox
storage.

## Maintainers ##

George Anderson (geoanders)
https://www.drupal.org/u/geoanders
