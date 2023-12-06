# PROJECT TITLE
YOWL

# DESCRIPTION
YOWL is a free website allowing the users to share their comments on any content. The application decentralizes comments from social networks.

# AUTHORS
Melinda Ndongo, Maryna Pichyk

# FRONTEND LANGUAGES
HTML5
CSS3
JAVASCRIPT

# BACKEND LANGUAGES
PHP

# FRAMEWORKS
Laravel 10
Vue.Js

# DATABASE
MySQL


# FUNCTIONALITIES


---

# GETTING STARTED
Install Axios in VueJs:
npm i axios

Install bootstrap in VueJs:
npm install --save bootstrap
npm install --save @popperjs/core

Install VueToaster in VueJs:
npm install vue-toast-notification@^3

3. 
In order to update the database, run in terminal:
php artisan migrate:fresh --seed

Run seeders to create fake users, posts, comments, and categories by running the following command in the terminal: 
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PostSeeder
php artisan db:seed --class=CommentSeeder
php artisan db:seed --class=CategorySeeder

Attention, il y aura des exception messages lors de deux dernières seeder executions.

## Badges

