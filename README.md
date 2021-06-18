# REST_API_PHP
Here in this repository we have used REST APIs to execute CRUD operations in the Task Table and Sign-Up and Login using user table 

1)The rest_api_php File tackels the below given problem
Below is the DB you got to make followed by the APIs.

DB:
user
	- user_id (BIgInt | primary key | Auto Increment)
	- username (unique | Not Null)
	- phone (Not Null)
	- password (AES_ENCRYPT with key="AWESOME" | Not Null)
	- create_date_time (record creation time | Not Null)
	- status (enum: 0/1 | 1 => Default) [ 0 => Blocked | 1 => Active ]
	
Task
	- task_id (BIgInt | primary key | Auto Increment)
	- user_id (BIgInt | FK[user(user_Id)]
	- title (Not Null)
	- description (Not Null)
	- pic (URL of the file [relative URL] | Nullable)
	- create_date_time (record creation time | Not Null)
	- status (enum: 0/1 | 0 => Default) [ 0 => Active | 1 => Done]
	
Make PHP API for sign up, log in, task creation, and viewing task. 


2)The Hierarchy_View File tackels the below problem
Describe an algorithm to display the hierarchy view. You are given a table with 3 columns.
Column 1: SI No.
Column 2: Title
Column 3: Parent ID

Now, for the below hierarchy,

- Joke
- Memes
   - Old 
     - 90s
   - New
- Dank 

The table would look like, 

SI No. | Title | Parent ID 
1 | Joke | Null
2 | Meme | Null
3 | Old | 2
4 | 90s | 3
5 | New | 2
6 | Dank | Null


Now, the task is to fetch the table values and display the hierarchy on-screen (index.php).


