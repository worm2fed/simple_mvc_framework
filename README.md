## TASK DESCRIPTION
I had to create a simple app without using any framework. The app should represent MVC pattern.
App is a task-manager. Tasks consists of:
- user name
- email
- task text
- image
- status
- date (optional)

On the start page user can add see list of all task and create own task without registration. User can sort tasks by email, name and status. Tasks are shown by 3 items per page (with pagination).

Before task creation user can preview a task without page reloading. Also user can attach an image to task (formats: JPG/GIF/PNG, and size: not great than 320x240 pixels - otherwise image has to be scaled)

There are admin user with login 'admin' and password '123'. Actually, I implement auto user creation due adding task - username and password are equal to user email. If user already exists there are nothing to do.

Admin user can edit any task text and mark tasks as done. Task owner can edit and mark his tasks.

## NOTICE:
In this app: 
- NOT EVERY EXCEPTION WAS HANDLED! 
- you should use `bind_param()` on DatabaseHandler (or something like this) to protect your database from injections
- when user creates a task with images - images uploads to sever. You should protect your server from abuse uploads. You can upload images to temp dir (which are cleaned every fixed time) and move image to main folder after task creation. You can use cookie to create drafts. Or you can upload image only after task creation =)
- This is not production code, be careful!

## PROJECT STRUCTURE

```
# Web controller classes
controllers/
# App core
core/
    # Custom exceptions
    exceptions/
# Required module to view source code
dayside/*
# Database models
models/
# Static files
static/
    # Styles
    css/
    # Fonts
    fonts/
    # Uploaded images
    images/
    # JS
    js/
# Templates
templates/
# View pages
view/
    # Task views
    task/
# Git ignore settings
.gitignore
# Git modules settings
.gitmodules
# Web server user settings
.htaccess
# App configuration
Config.php
# Databse dump
db.sql
# Log file
error.log
# Favicon
favicon.ico
# App entry point
index.php
# This README.MD file
README.MD
```
