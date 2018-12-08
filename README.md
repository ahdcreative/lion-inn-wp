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

Now we need to clone the repository.  Open a cmd prompt, or Git Bash.  Navigate to the ```htdocs``` directory in your WAMP installation. It is probably something like this : ```C:\Bitnami\wampstack-7.1.23-0\apache2\htdocs```.

Clone the repository into this htdocs directory with:

```git clone https://github.com/LordA98/lion-inn-wp.git```

#### WP-CLI

We must first install ```wp-cli``` and add it to the path.

#### Restore Site & Database

The reason we need the wp-cli is because we need to restore the site's database using the VersionPress plugin.

Navigate to the repository and run:

```wp vp restore-site```

#### Is It Working?

We need to check everything is working.

Open the Bitnami WAMP Stack Manager Tool.  Open the 'Manage Servers' tab.  Select 'Start All'.  We need both the SQL Server and the Apache Web Server running.


### Mac OSX

#### MAMP

Download and install MAMP - we need this to run PHP / WordPress on our local machine.

#### Clone

```git clone https://github.com/LordA98/lion-inn-wp.git```

#### WP-CLI

We must first install ```wp-cli``` and add it to the path.



## Development

### Workflows

#### Git & GitHub

_After cloning and initial setup._

__Standard Workflow__

```git add -A```

```git commit -m "Commit Message"```

```git push```

__VersionPress Pulling__

_After cloning and initial setup._

This is slightly different to the normal git workflow as we need to pull the database changes as well.

```wp vp pull```


#### Development

Development can be done in either the WordPress wp-admin page and / or within a text editor to edit the code.



### WordPress

#### Plugins

#### Theme



## Deployment 


## Documentation
