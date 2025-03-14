# Perpusans

Perpusans is a library management software project designed to facilitate book management and other related data.

## Features

- **Book Management**: Add, edit, and delete book information.
- **Member Management**: Manage library member data.
- **Borrowing and Returning**: Record book borrowing and returning transactions.

## Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Mahklvk/perpusans.git
   ```

2. **Navigate to the project directory**:

   ```bash
   cd perpusans
   ```

3. **Database Configuration**:

   - Create a new database in MySQL.
   - Import the database schema located in the `config` folder into the newly created database.

4. **Configure Database Connection**:

   - Open the `config/database.php` file.
   - Adjust the database connection settings according to your local configuration.

5. **Install Dependencies**:

   - Ensure you have a web server like Apache or Nginx that supports PHP.
   - Make sure PHP and MySQL are installed on your system.

6. **Run the Application**:

   - Access the application via a browser by visiting `http://localhost/perpusans`.

## Usage

- **Admin Login**:

  - Access the admin panel at `http://localhost/perpusans/admin`.
  - Use the default credentials:
    - Username: `admin`
    - Password: `admin123`

- **Main Functions**:

  - **Book Management**: Add, edit, or delete books through the "Books" menu in the admin dashboard.
  - **Member Management**: Manage member data through the "Members" menu.
  - **Transactions**: Record book borrowing and returning through the "Transactions" menu.

## Contribution

Contributions are welcome. Please fork this repository and create a pull request for any improvements or additional features.

## License

This project is licensed under the Apache license 2.0. See the [LICENSE](LICENSE) file for more details.
