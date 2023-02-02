### install

#laravel new nome_app --create project 

#php artisan serve  --run webserver

#composer require laravel/ui --dev   --install ui for auth
php artisan ui vue --auth


###tailwind 

  1 npm install

  2 npm install -D tailwindcss postcss autoprefixer

  3 npx tailwindcss init

  4 configure tailwind.config.js   add in content
     "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

 in file webpack add 

 .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
  ])


  in resources css add 

  @import "tailwindcss/base";

@import "tailwindcss/components";

@import "tailwindcss/utilities";

npm run watch


create a controller

php artisan make:controller NameController

php artisan make:controller GalleryController --resource  --crea controller con crud methods


create a model

php artisan make:migration gallery


run migrate
php artisan migrate

php artisan make:model nametabel