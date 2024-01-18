## About

This is a sample web application designed to track SUSL Sport events and allow users to book event venues. The app provides a user-friendly interface for managing sports events, including creating new events, updating event details, and booking venues. It also offers features such as event notifications, participant registration, and event statistics. With this app, users can easily stay updated on upcoming sports events and conveniently book venues for their favorite activities.

## Setup

To set up this project, follow the steps below:

1. Install PHP on your machine.
2. Install Composer, the PHP package manager.
3. Install Laravel by running `composer global require laravel/installer`.
4. Install project dependencies by navigating to the project directory and running `composer install`.
5. Install Node.js and npm on your machine.
6. Install project dependencies by running `npm install`.
7. Create a `.env` file by copying the `.env.example` file and updating the necessary values.
8. Run the database migrations by running `php artisan migrate`.
9. Start the development server by running `php artisan serve`.
10. Build the frontend assets by running `npm run dev`.

For more information, please visit the following official sites:

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Livewire](https://laravel-livewire.com/)
- [Mailtrap](https://mailtrap.io/)


Now you have successfully set up the project. You can access it by visiting the URL provided by the development server.


### Database Seeds

The database migration will add default sports, default venue, and an admin user. The admin user credentials are as follows:

- Email: admin@mail.com
- Password: password

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
