
Student Services Platform

A Laravel-based web application designed to streamline academic and administrative services at the University of Juba. The platform serves three main roles — Admin, Lecturers, and Students — each with dedicated dashboards and access levels to enhance the digital experience within the university environment.

## Features

- Multi-role authentication and access control
- Centralized course and academic calendar management
- Real-time notifications to students and lecturers
- Student support ticket system
- Assignment uploads and grading
- Result management and publication

## User Roles

1. Admin
   
a. Register and manage students and lecturers
b. Create and manage academic courses
c. Set up and edit the academic calendar
d. Send notifications to students and lecturers
e. Oversee platform activities

3. Lecturers
   
a. Upload student results
b. Create, assign, and grade assignments
c. View academic calendar and platform announcements

3. Students

a. View personal and academic information
b. Access grades and performance reports
c. Receive notifications from admin
d. Track academic calendar
e. Request technical or academic support


Installation

# Clone the repository
git clone https://github.com/sharif-omer/University-of-Juba.git/
cd University-of-Juba

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install && npm run dev

# Configure environment variables
cp .env.example .env
php artisan key:generate

# Set up database
php artisan migrate --seed

# Serve the application
php artisan serve


Roadmap

[x] Admin/Student/Lecturer authentication

[x] Admin management of users and courses

[x] Academic calendar module

[x] Notification system

[x] Assignment and grading system

[ ] Student support ticketing


