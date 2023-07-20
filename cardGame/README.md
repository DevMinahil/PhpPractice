# Project Title: Uno Game - PHP Backend for Practicing PHP Basics

This project is a simple Uno card game developed using PHP as the backend. It serves as a practical exercise to learn and practice PHP basics.

## Prerequisites:
- PHP version 8.1 installed on your system
- Visual Studio Code (VS Code) with the PHP extension installed
- phpMyAdmin version 8.3.0 downloaded and set up.
## Game Rules:
- Uno is a card game played with a specially printed deck.
- The deck consists of 108 cards, including four colors (red, green, blue, and yellow), each with values from 0 to 9, along with special action cards (Skip, 
  Reverse, and Draw Two).
- The objective of the game is to be the first player to get rid of all your cards.
- At the beginning of the game, each player is dealt 7 cards.
- The top card of the deck is placed in discard pile.
- Players take turns matching a card from their hand to the top card on the table, either by color or value or action.
- Special action cards can be used to skip the next player's turn, reverse the order of play, or make the next player draw additional cards.
- If a player doesn't have a matching card, they must draw a card from the deck until they can play a card.
- The first player to get rid of all their cards wins the game. 

## Getting Started:

### Cloning the Project:
1. Open a terminal or command prompt on your PC.
2. Change the current directory to the location where you want to clone the project.
3. Run the following command to clone the repository: ```https://github.com/DevMinahil/PhpPractice/tree/master/cardGame```
### Database Setup:
1. Open phpMyAdmin and create a new database called "Users".
2. Open the "Users" database and create a table users using the below query:
```sql
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) COLLATE utf8mb4_0900_ai_ci,
 email VARCHAR(255) COLLATE utf8mb4_0900_ai_ci,
 phone VARCHAR(20) COLLATE utf8mb4_0900_ai_ci,
 password VARCHAR(255) COLLATE utf8mb4_0900_ai_ci,
 IsAdmin TINYINT(1)
);
```
### Configurations:
1. Navigate to the config folder in the cloned project.
2. Open the connection.php file .
3. Modify the database credentials if necessary. By default, the username is "root" and the password is "123".
## Getting Started:
1. Open the project folder in Visual Studio Code.
2. Right-click on the index.php file and select "PHP Server: Serve project" in Visual Studio Code.
3. Now, you can enjoy the Uno game by signing in without checking the "Sign in as admin" radio button. If you want to view all registered users, sign in as an admin.



