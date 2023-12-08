# PROJECT TITLE
YOWL

# DESCRIPTION
YOWL is a free website allowing the users to share their comments on any content. The application decentralizes comments from social networks.

# AUTHORS
Melinda Ndongo, Maryna Pichyk

# FRONTEND LANGUAGES
- HTML5
- CSS3
- JAVASCRIPT

# BACKEND LANGUAGES
PHP

# FRAMEWORKS
Laravel 10
Vue.Js

# DATABASE
MySQL

# Features

- Axios
- Sanctum
- Bootstrap
- Vuetify
- Toast

# FUNCTIONALITIES

- Non user: see all posts, search them through search bar.
- Register: create user by entering username, password, confirm password email adress, click the sign up/register button, get an e-mail verification, 
- Login: type credentials, click the login/signin button and be logged in, gives access to user actions, user profile page,
- Logout: disconnect user by clicking the logout button,
- User actions: crud post, crud comments, (vote +1 or -1),
- crud post: click button + or link in user profile/landing page to add a post, type in your title and text content, eventually add an image and a link, create your post by clicking the button,
- crud comments: click to add a comment, type and save it, modify it, delete it by clicking the button add/modify/delete button. 
- Search bar: type text and search for all posts that contains typed text, then press enter

# GETTING STARTED
Install Axios in VueJs:
npm i axios

Install bootstrap in VueJs:
- npm install --save bootstrap
- npm install --save @popperjs/core

Install VueToaster in VueJs:
npm install vue-toast-notification@^3

3. 
In order to update the database, run in terminal:
php artisan migrate:fresh --seed

Run seeders to create fake users, posts, comments, and categories by running the following command in the terminal: 
- php artisan db:seed --class=UserSeeder
- php artisan db:seed --class=PostSeeder
- php artisan db:seed --class=CommentSeeder
- php artisan db:seed --class=CategorySeeder

Attention, il y aura des exception messages lors de deux dernières seeder executions.

## Badges

