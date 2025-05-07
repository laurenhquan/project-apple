# What is Project Apple?
A blogging website inspired by applerankings.com that encourages users to share their opinions and ratings on various subject matters in an organized format.

# How to Run the Program Locally
## Installing XAMPP
1. Download [XAMPP](https://www.apachefriends.org/download.html) through the official website.
2. Follow the set up instructions, making sure MySQL and phpMyAdmin are selected in the Components section.
## Cloning the repository
1. On the main [Github](https://github.com/laurenhquan/project-apple) page, click on the green "<> Code" button.
2. Under the "Local" tab, copy the HTTPS url or click "Open with Github Desktop."
### Using the HTTPS url
3. Under the "File" tab, select "Clone repository..."
4. Select the "URL" tab.
5. Paste the HTTPS url into the "Repository URL or Github username and repository" section.
6. Under the "Local path" section, select "Choose..."
7. Find where you installed your XAMPP folder.
8. Select the "htdocs" folder to clone the repository into. Note: You may need to create an empty folder within the "htdocs" folder.
## Setting up the database
1. Open the XAMPP Control Panel.
2. Start the Apache and MySQL modules.
3. Open up your browser.
4. Navigate to [phpMyAdmin](http://localhost/phpmyadmin).
5. On the left-hand side navigation bar, click "New."
6. Under the "Create database" section, title the "Database name" as "project_apple".
7. Hit "Create".
8. If not automatically redirected, click the "project_apple" label on the left-hand side navigation bar.
### Setting up the database table for posts
9. Under the "Create new table" section, enter the following information:
    a. "Table name": "posts"
    b. "Number of columns": 6
10. Hit "Create".
11. Once redirected to the database structure, enter the following data:
    | **Name** | **Type** | **Length/Values** | **Null** | **Index** | **A_I** |
    | -------- | -------- | ----------------- | -------- | --------- | ------- |
    | post_id | INT | 11 | FALSE | PRIMARY | TRUE |
    | topic_id | INT | 11 | FALSE |  | FALSE |
    | subject_name | VARCHAR | 32 | FALSE |  | FALSE |
    | rating | TINYINT | 1 | FALSE |  | FALSE |
    | rating_desc | TEXT |  | TRUE |  | FALSE |
    | user_id | INT | 11 | FALSE |  | FALSE |
12. Hit "Save".
### Setting up the database table for topics
13. On the "project_apple" database page, navigate to the "Create new table" section.
14. Enter the following information:
    a. "Table name": "topics"
    b. "Number of columns": 2
15. Hit "Create".
16. Once redirected to the database structure, enter the following data:
    | **Name** | **Type** | **Length/Values** | **Null** | **Index** | **A_I** |
    | -------- | -------- | ----------------- | -------- | --------- | ------- |
    | topic_id | INT | 11 | FALSE | PRIMARY | TRUE |
    | topic_name | VARCHAR | 32 | FALSE | UNIQUE | FALSE |
17. Hit "Save".
18. Under the now created "topics" page, navigate to the "Insert" tab.
19. Under the "Value" section, enter the following data:
    a. "topic_id": 1
    b. "topic_name": "eatery"
20. Hit "Go".
21. Repeat steps #18-20 with the following data:
    {
        "topic_id": 2
        "topic_name": "food"
    }
    {
        "topic_id": 3
        "topic_name": "drinks"
    }
    {
        "topic_id": 4
        "topic_name": "products"
    }
    {
        "topic_id": 5
        "topic_name": "movies"
    }
    {
        "topic_id": 6
        "topic_name": "tvshows"
    }
    {
        "topic_id": 7
        "topic_name": "videogames"
    }
    {
        "topic_id": 8
        "topic_name": "books"
    }
### Setting up the database table for users
22. On the "project_apple" database page, navigate to the "Create new table" section.
23. Enter the following information:
    a. "Table name": "users"
    b. "Number of columns": 3
24. Hit "Create".
25. Once redirected to the database structure, enter the following data:
    | **Name** | **Type** | **Length/Values** | **Null** | **Index** | **A_I** |
    | -------- | -------- | ----------------- | -------- | --------- | ------- |
    | user_id | INT | 11 | FALSE | PRIMARY | TRUE |
    | username | VARCHAR | 32 | FALSE | UNIQUE | FALSE |
    | pass_hash | VARCHAR | 255 | FALSE | UNIQUE | FALSE |
26. Hit "Save".
## Accessing the site
Now that the database is set up, the [website](http://localhost/project-apple/front-end/)'s home page can be accessed locally.