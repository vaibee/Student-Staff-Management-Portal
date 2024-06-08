# Student-Staff-Management-Portal

## Overview
The Student Staff Management Portal is a web application that enables students and staff to register on the platform. Staff members can upload and update student marks, which are stored in a MariaDB database. Students can log in to view their marks. This project is built using PHP and MariaDB.

## Features
- **User Registration**: Students and staff can register and create an account.
- **Staff Functionality**:
  - Upload student marks.
  - Update student marks.
- **Student Functionality**:
  - View marks uploaded by staff.

## Technologies Used
- **Backend**: PHP
- **Database**: MariaDB
- **Frontend**: HTML, CSS, JavaScript (optional)

## Installation

### Prerequisites
- PHP (>= 7.0)
- MariaDB
- Web Server (e.g., Apache, Nginx)

### Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/student-staff-management-portal.git
    cd student-staff-management-portal
    ```

2. **Set Up Database**:
    - Create a database in MariaDB.
    - Import the provided SQL script to set up the necessary tables:
      ```sql
      sql cmd for studentproject :
      CREATE DATABASE studentproject;
      USE studentproject;
      CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) NOT NULL,
      email VARCHAR(100) NOT NULL,
      password VARCHAR(255) NOT NULL
      );
      CREATE TABLE marks (
          id INT AUTO_INCREMENT PRIMARY KEY,
          student_username VARCHAR(50) NOT NULL,
          subject VARCHAR(50) NOT NULL,
          marks INT NOT NULL,
          FOREIGN KEY (student_username) REFERENCES users(username)
      );


      sql cmd for teacherproject :
      
      CREATE DATABASE teacherproject;
      
      
      USE teacherproject;
      
      
      CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(50) NOT NULL,
          email VARCHAR(100) NOT NULL,
          password VARCHAR(255) NOT NULL
      ); ```

3. **Configure the Application**:
    - Update the database configuration in the PHP files (e.g., `config.php`) with your database credentials:
      ```php
      // config.php
      $db_host = 'localhost';
      $db_user = 'your_db_username';
      $db_pass = 'your_db_password';
      $db_name = 'student_staff_management';
      ```

4. **Run the Application**:
    - Ensure your web server is configured to serve the project directory.
    - Access the application through your web browser (e.g., `http://localhost/student-staff-management-portal`).

## Usage

1. **Registration**:
   - Students and staff can register by providing necessary details on the registration page.

2. **Staff Actions**:
   - Log in with staff credentials.
   - Navigate to the marks management section.
   - Upload or update student marks.

3. **Student Actions**:
   - Log in with student credentials.
   - Navigate to the marks section to view uploaded marks.

## Contributing
Contributions are welcome! Please fork the repository and create a pull request with your changes. Make sure to follow the coding standards and include relevant tests for your changes.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
For any queries or support, please contact [your.email@example.com](mailto:your.email@example.com).
