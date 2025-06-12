## Support Ticket Management System

A web-based support ticket system that enables customers to log issues through a categorized form. Each ticket is automatically saved to the relevant department's database to streamline issue resolution.

## Features

- User-friendly Support Ticket Form with required ticket type selection.
- Automated routing of tickets to department-specific MySQL databases.
- Admin Panel with secure login.
- Ticket overview using DataTables with filtering and searching.
- Detailed ticket view with a rich text editor for admin notes.
- Ticket status updates reflecting admin actions.

## Support Ticket Form

- Customers select the Ticket Type (e.g., Technical Issues, Billing, etc.)
- Basic input fields capture ticket details.
- On submission, the system automatically saves the ticket to the corresponding MySQL database for the selected department.

## Admin Panel 

- Secure login page for a single admin user.
- Ticket List using DataTables, showing tickets from all departments.
- View Ticket page with full details and a rich text editor for adding notes.
- Admin notes update the ticket status to "Noted".

## Getting Started

- Clone the repository
- Set up environment files for each department’s database and main database to store admin details.
- Run migrations to create tickets tables in each database.
- Run AdminSeeder for creating admin user in main database.
- Serve the application with your preferred web server.
- Access the form at /.
- Access the admin panel at /login using the credentials provided in the AdminSeeder Class.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

