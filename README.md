## This is Bykecms

We are trying to reinvent the bike in Content Management Systems area.

### Demo

Check Demo Webstore on https://demo.bykecms.com

### Installation

1. Clone this repository to your localhost and mount your PHP server.
2. Create MySQL database `byke_cms` and import SQL file `/byke_cms.sql` (demo files are included)
3. Configure and rename file `/.env.example` to `/.env`
4. Go to your http://localhost/bykecms/public to see the demo site
5. Login to Bykecms at http://localhost/bykecms/public/login with `hi@bykecms.com/TheBestWebEngine`
6. Control Panel is at http://localhost/bykecms/public/cms
7. You are done.

### Changing CMS language

Change `App::setLocale('en')` setting in `/routes/web.php`. Available languages: `en`, `lt`.

### Create private fork of this repository for your own project

https://gist.github.com/0xjac/85097472043b697ab57ba1b1c7530274

### Database Migrations

Started from 2020-12-09

### Licence

It is absolutely free for any use! It is Open Source CMS.

You can do whatever you want with it: use, edit, rebrand, sell and etc. 