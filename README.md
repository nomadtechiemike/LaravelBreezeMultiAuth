# LaravelBreezeMultiAuth
A base app using Laravel 10, Breeze with Multi Auth Admin, User, Manager

## Laravel Breeze Multi Auth (Current: Laravel 10.*) 

<br/>
<!-- [![Latest Stable Version]](https://packagist.org/packages/techiemike/laravelbreezemultiauth) -->
<br/>
[![StyleCI](https://github.styleci.io/repos/654555298/shield?branch=main)](https://github.styleci.io/repos/654555298?branch=main)
<br/>
### Enjoying this project? [Buy me a beer 🍺](https://www.buymeacoffee.com/techiemikes)


### Install and setup ###
Download this repo, run the following commands:

edit the .env file with your database information!
npm install
php artisan migrate
php artisand db:seed


### Credentials

**Admin:** admin@gmail.com  
**Password:** Password!

**User:** user@gmail.com  
**Password:** Password!

**User:** manager@gmail.com  
**Password:** Password!


### Introduction

Laravel Breeze Multi Auth provides you with a massive head start on any size web application. 

### Issues

If you come across any issues please [report them here](https://github.com/nomadtechiemike/LaravelBreezeMultiAuth/issues).

### Contributing

Thank you for considering contributing to the Laravel Breeze Multi Auth project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to Techie Mike at techie.mike@protonmail.com.

### Security Vulnerabilities

If you discover a security vulnerability within this boilerplate, please send an e-mail to Anthony Rappa at techie.mike@protonmail.com, or create a pull request if possible. All security vulnerabilities will be promptly addressed.

### License

MIT: [http://techiemike.mit-license.org](http://techiemike.mit-license.org)

You can add as many roles as you want, just edit the profileController and add the folders/dashbards

Current folder structure:
Views/admin/dashboard.blade.php
Views/user/dashboard.blade.php
Views/manager/dashboard.blade.php

Make sure you add additional routes for other user types, and update the AuthenticatedSessionsController 

 <pre>{
    elseif ($request->user()->role == 'user') {
            $url = '/user/dashboard';
     }
    
}</pre>

