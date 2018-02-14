# [China Restaurant Kimberley Website](https://chinarestaurantkby.co.za/)

A website created for my uncle's restaurant in Kimberley for a project in my final year of my Bachelor's degree.

Unfortunately the owner of the site doesn't want the site anymore so you won't be able to access it, however you can download these source files and run it on your computer.

## Installation

First clone the repo to your machine, then run the following command in your terminal in the project's directory

    npm install

Node Package Manager will install all the required packages.

I used `gulp-sass`, `gulp-pug`, `gulp`, `gulp-autoprefixer`, `gulp-clean-css`, and `gulp-html-prettify` to create this website. Another package I should of included was `browser-sync`, but I only learnt how to use that later on in the project development.

## Usage

In the root directory of the project, run the following command:

    gulp

Gulp will keep watch of all the edits that happen for `pug` files and `sass` files which are stored in their own respective directories.

To update only `pug` files, run the following command:

    gulp pug

To update only `sass` files, run the following command:

    gulp sass
