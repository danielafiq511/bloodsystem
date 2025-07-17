# CakePHP Application Skeleton

![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=5.x)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 5.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Note For Teammates

### First Time Setup
1. Download and install Git from: https://git-scm.com/downloads

2. Open Command Prompt (cmd) and set up your GitHub identity:
```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

3. Get the project files:
- Create a new folder where you want the project
-  Open Command Prompt in that folder
- Copy and paste this command:
```bash
git clone https://github.com/danielafiq511/bloodsystem.git
```

4. Set up the project
- Open Laragon
- Open phpMyAdmin and create a new database named 'bloodbases'
- Go to project folder, open the terminal and copy this
```bash
copy config\app_local.example.php config\app_local.php
```
- Edit app_local.php and update these settings:
```php
<?php
'username' => 'root'
'password' => ''
'database' => 'bloodbases'
```
5. Install project
```bash
composer install
composer update
bin/cake migrations migrate
bin/cake migrations seed --seed UsersSeed 
bin/cake cache clear_all
```
### Test the website
1. Go to https://localhost/bloodbases
2. Login with:
- Admin: test123@localhost.com / test123 (ni abaikan dulu)
- User: make registration

### Making Changes
After cloning the repository, do this after each update to the folder, clone is done once to get the folder, pull is getting the latest update from the folder.

1. Before starting work, open the command prompt/powershell and run in the folder
```bash
git pull origin main
```
2. After Making Changes (one at a time):
```bash
git add.
git commit -m "Write comment what has been done"
git push origin main
```
