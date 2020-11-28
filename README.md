## This is Bykecms

We are trying to reinvent the bike in Content Management Systems area.

### Installation

1. Clone this repository to your localhost and mount your PHP server.
2. Create MySQL database `bykecms` and import SQL file `/bykecms.sql` (demo files are included)
3. Configure and rename file `/.env.example` to `/.env`
4. Go to your http://localhost/bykecms/public to see the demo site
5. Login to Bykecms at http://localhost/bykecms/public/login with `hi@bykecms.com/TheBestWebEngine`
6. Control Panel is at http://localhost/bykecms/public/cms
7. You are done.

### Changing CMS language

Change `App::setLocale('en')` setting in `/routes/web.php`. Available languages: `en`, `lt`.

### Licence

It is absolutely free for any use! It is Open Source CMS.

You can do whatever you want with it: use, edit, rebrand, sell and etc. 