<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
About This Application
This project is a modern web-based video streaming platform built using Laravel 11. It aims to deliver a secure, efficient, and user-friendly experience, complete with advanced features for managing user authentication, handling sensitive data securely, and providing a rich user interface.

Key Features
Secure Authentication: The application uses Laravel's built-in authentication system to manage user access, ensuring only authorized users can access sensitive features.
Middleware Protection: Security is enhanced with middleware that restricts access to routes based on user authentication.
Data Hashing: Critical data, such as user passwords and IDs, is hashed to prevent unauthorized access and manipulation.
Database Management: Eloquent ORM and Laravel migrations make managing the database seamless and efficient.
Dynamic UI: The frontend is developed using Bootstrap and Owl Carousel for a responsive and visually appealing user experience.
Inspect Element Protection: While complete prevention isn't possible, JavaScript measures are in place to deter element inspection attempts.
Technologies & Packages Used
Framework: Laravel 11
Middleware: Protects routes to ensure only authenticated users can access certain areas.
Hashing: Uses Laravel’s Hash facade for encrypting sensitive user information.
Database: Managed using Eloquent ORM with support for various database backends.
Frontend: Developed with Bootstrap and Owl Carousel for a polished and interactive UI.
JavaScript Libraries: SweetAlert2 for alert notifications, among others.