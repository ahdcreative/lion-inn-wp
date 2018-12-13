# The Lion Inn Website
## www.lioninn.co.uk

## Overview

This repository contains all the files used for developing the main WordPress version for The Lion Inn website.  

The alpha version (the lion-inn-alpha repository) was made as an MVP.  The goal was to get it released before Christmas so that a more up-to-date menu was available for customers.

The next stage was to create a WordPress version of the site so that it was editable by the owner of the pub.  That is this repository.  

The Lion Inn is a pub in Trellech, Monmoutshire, Wales.

## Technologies & Tools

__WordPress__ - Content Management System (CMS) used so that client can edit and update site when needed (within reason).

__HTML__ - Markup language used for theme (obviously).

__CSS__ - Used to style theme (on top of Bootstrap styles).

__Bootstrap__ - Front-End Framework used to style themes.  Primary use is for scalability and structure.

__JavaScript__ & __JQuery__ - Used for theme functionality (on top of Bootstrap).

__PHP__ - Scripting inside of WordPress.

__Taiga__ - Agile / Kanban board to track things to-do and passively document previous bugs and features.

__Git__ & __GitHub__ - Source control (obviously - you're here).

__WAMP__ - Local server to host WordPress installation and site.

## Download & Setup

### Windows

_Assumed Windows 10 but will probably also work with Windows 7_

#### WAMP

Download and install Bitnami WAMP - we need this to run PHP / WordPress on our local machine.

#### Clone

Now we need to clone the repository.  Open a cmd prompt, or Git Bash.  Navigate to the ```htdocs``` directory in your WAMP installation. It is probably something like this : ```C:\Bitnami\wampstack-7.1.23-0\apache2\htdocs\```.

Clone the repository into this htdocs directory with:

```git clone https://github.com/LordA98/lion-inn-wp.git```

#### WP-CLI

We also need to install ```wp-cli``` and add it to the path.

Unzip the ```wp-cli.zip``` from the misc/ folder, into your C:/ drive.

We need to add it to PATH now.

Press the windows button --> search 'environment' --> Select 'Edit the system environment variables' --> Select 'Environment Variables' --> Click PATH under user variables --> Select 'Edit...' --> Add 'C:\wp-cli' --> OK --> OK --> OK.

Run ```wp --info``` in Git Bash or a cmd prompt to check it's working.

#### Restore Site & Database

The reason we need the wp-cli is because we need to restore the site's database using the VersionPress plugin.

Create the database:

Navigate to https://localhost/phpmyadmin/.

Create a new database called 'lioninn'.

Create wp-config.php file:

If your localhost/phpmyadmin has a password:

```wp core config --dbname="lioninn" --dbuser="root" --dbpass="yourpasswordhere"```

If not:

```wp core config --dbname="lioninn" --dbuser="root"```

Navigate to the repository and run:

```wp vp restore-site --siteurl='http://localhost/lion-inn-wp/' --require=wp-content/plugins/versionpress/src/Cli/vp.php```

#### Is It Working?

We need to check everything is working.

Open the Bitnami WAMP Stack Manager Tool.  Open the 'Manage Servers' tab.  Select 'Start All'.  We need both the SQL Server and the Apache Web Server running.

Now, open a web browser and navigate to ```localhost:81/lion-inn-wp/wp-admin/```.  You may be asked to sign-in.  

### Mac OSX

#### MAMP

Download and install XAMPP - we need this to run PHP / WordPress on our local machine.

#### Clone

```git clone https://github.com/LordA98/lion-inn-wp.git```

#### WP-CLI

We also need to install ```wp-cli``` and add it to the path.

Open a terminal and navigate to the Downloads directory.

Run ```curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar```.

Run ```php wp-cli.phar --info``` to check it's working.

We need to add it to path in order to just use 'wp ...'.

Run ```chmod +x wp-cli.phar```.

Run ```sudo mv wp-cli.phar /usr/local/bin/wp```.

Run ```wp --info``` to check it's working.

#### Restore Site & Database

The reason we need the wp-cli is because we need to restore the site's database using the VersionPress plugin.

Export XAMPP PATH:

```
export PATH=/Applications/XAMPP/xamppfiles/bin:$PATH
export PATH
```

Create the database:

Navigate to https://localhost/phpmyadmin/.

Create a new database called 'lioninn'.

Create wp-config.php file:

If your localhost/phpmyadmin has a password:

```wp core config --dbname="lioninn" --dbuser="root" --dbpass="yourpasswordhere"```

If not:

```wp core config --dbname="lioninn" --dbuser="root"```

Navigate to the repository and run:

```wp vp restore-site --siteurl='http://localhost/lion-inn-wp/' --require=wp-content/plugins/versionpress/src/Cli/vp.php```

#### Is It Working?

We need to check everything is working.

Open the Bitnami WAMP Stack Manager Tool.  Open the 'Manage Servers' tab.  Select 'Start All'.  We need both the SQL Server and the Apache Web Server running.

Now, open a web browser and navigate to ```localhost:81/lion-inn-wp/wp-admin/```.  You may be asked to sign-in. 

## Development

### Workflows

#### Git & GitHub

_After cloning and initial setup._

__Standard Workflow__

Make your changes - whether that be in the code or on the wp-admin page.

```git add -A```

```git commit -m "Commit Message"```

When you are ready, push the changes to the remote repository on GitHub.

```git push```

__VersionPress Pulling__

_After cloning and initial setup._

This is slightly different to the normal git workflow as we need to pull the database changes as well.

```wp vp pull```

#### Development

Development can be done in either the WordPress wp-admin page and / or within a text editor to edit the code.

### Code

If you need to edit the code, open the entire project repository in a text editor.

You make alterations to the code here.  Changes may take a while to update in your browser, so you may have to wait a bit longer and refresh the page again.

### WordPress

A lot of the development work will need to be done within the WordPress admin dashboard.  This can be accessed at ```localhost:81/lion-inn-wp/wp-admin/```.  

#### Plugins

The site currently uses these plugins:

__Ultimate Fields__ - Used to make the website editable by the client.  For example, the menu page uses ultimate fields - most importantly, repeaters, so that the client can add, delete and update menu items.

__VersionPress__ - Used for Git version control.  Helps to keep the database synchronized between development instances.  Refer to the Development --> Workflows --> Git & GitHub section above.

#### Theme

The theme used for the site is located in ```C:\Bitnami\wampstack-7.1.23-0\apache2\htdocs\wordpress\wp-content\themes\lioninn```.  Most of the code changes will be in here.  There will likely be little to no need to edit the code elsewhere.  The code within this directory resembles what the website looks like.

## Deployment

_TODO_

## Documentation

_TODO_
