
# Project Title
A uno game developed using php as backend for purpose of practicing php basics


## Acknowledgements

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)

## Prerequisites:
- PHP version 8.1 installed on your system
- Visual Studio Code (VS Code) with the PHP extension installed
  phpMyAdmin downloaded and set up
## Database Setup:
- Open phpMyAdmin and create a new database called "Users".

- Inside the "Users" database, create a table named "users" with the following attributes:
| Column   | Type         | Collation           | Null | Default | Extra          |
|----------|--------------|---------------------|------|---------|----------------|
| id       | int          |                     |      |         | AUTO_INCREMENT |
| name     | varchar(255) | utf8mb4_0900_ai_ci  |      |         |                |
| email    | varchar(255) | utf8mb4_0900_ai_ci  |      |         |                |
| phone    | varchar(20)  | utf8mb4_0900_ai_ci  |      |         |                |
| password | varchar(255) | utf8mb4_0900_ai_ci  |      |         |                |
| IsAdmin  | tinyint(1)   |                     |      |         |                |

			
## Deployment:
- Install PHP version 8.1 on your system.
- Install the PHP extension in Visual Studio Code.
- Download and set up phpMyAdmin.
- Follow the instructions above to create the "Users" database and the "users" table.
- Right-click on the index.php file and select "PHP Server: Serve project" in  Visual Studio Code.
- Now, to enjoy the game, sign in without checking the "Sign in as admin" radio button. If you want to view all registered users, sign in as an admin.
Make sure you have all the necessary dependencies installed and the configurations set up correctly for a successful deployment.