
# Travel Management System Project Overview

## Introduction:
The Travel Management System is a web-based application designed to facilitate various aspects of travel and tour management. This system allows users to register, book travels, manage tours, and administer the platform. It includes features such as user registration, travel booking, tour management, user administration, and more.
Key Features:
User Registration and Authentication:
Users can register on the platform by providing essential information such as username, email, birthday, and password.
The system ensures data integrity by checking the uniqueness of usernames and emails during registration.
User authentication is implemented to secure access to the platform.
User Profile Management:
Users can view and update their profiles.
Features include changing usernames, emails, passwords, and profile pictures.
## 
### Travel Booking:
Users can book travels by providing details such as departure city, arrival city, departure date, arrival date, and other relevant information.
The system validates user inputs and ensures data consistency.
Booking confirmation messages are displayed upon successful travel bookings.
Admin Management:
Admins have the ability to designate or revoke admin privileges for specific users.
This feature allows for user administration and control over the platform.
## 
### Special Tours and Categories:
Special tours are organized into categories, making it easier for users to explore and select their preferred tours.
Admins can manage tour categories, including adding, editing, and deleting them.

Email Marketing:
The system supports the collection of emails for marketing purposes.
Users can subscribe to newsletters, and admins can view and manage collected emails.
Statistics and Analytics:
The system collects and analyzes visitor statistics, including IP addresses, date of visit, pages viewed, country, and city.
Admins can monitor the number of page views and other relevant analytics.

## 
### Technologies Used:
#### PHP for server-side scripting.
#### MySQL for the database management system.
#### HTML, CSS, and JavaScript for frontend development.
#### AJAX for asynchronous communication between the client and server.
## 
### Project Structure:
#### DataAccess.php: A class handling database connectivity and operations.
#### UsersManager.php: A class managing user-related functionalities such as registration, login, and profile management.
#### Tvg.php (trait.php): A class containing various static methods related to different aspects of the travel project, including user management, travel booking, tour management, and more.
## 


### Conclusion:
```diff 
The Travel Management System is designed to streamline the travel and tour management process,
providing a user-friendly platform for both users and administrators. With features like user authentication,
travel booking, tour management, and analytics,
the system aims to enhance the overall travel experience for users while enabling effective administration.
```

## 


## 



## Here is the schema for your MySQL database named goodtravel:
### Table: billet
- idbillet (int, primary key, auto_increment)
- Type (varchar)
- boughtin (datetime)
- totalapayes (decimal)
- idvoyage (int)
- idtour (int)
- nbrdeplace (int)
- UserName (varchar)
- dateachat (datetime)
- prix (decimal)
### Table: cartebancaire
- idcarte (int, primary key, auto_increment)
- numcarte (varchar)
- detenteur (varchar)
- anneeexp (int)
- moisexp (int)
- crypto (varchar)
### Table: categories
- category_id (int, primary key, auto_increment)
- category_name (varchar)
### Table: messages
- id (int, primary key, auto_increment)
- name (varchar)
- email (varchar)
- subject (varchar)
- message (text)
- user (varchar)
- date_sent (timestamp)
### Table: mytable
- id (int, primary key, auto_increment)
- depart (varchar)
- destination (varchar)
- depart_date (date)
- arrival_date (date)
- depart_hour (time)
- arrival_hour (time)
- capacite (int)
- way (varchar)
- price (decimal)
### Table: reservations
- id (int, primary key, auto_increment)
- username (varchar)
- tour_id (int)
- reservation_date (date)
### Table: specialstours
- idtour (int, primary key, auto_increment)
- idcateg (int)
- titretour (varchar)
- city (varchar)
- datedepart (date)
- descriptiontour (text)
- capacite (int)
- image (varchar)
- prix (decimal)
- Region (varchar)
### Table: specialtourscategories
- idcate (int, primary key, auto_increment)
- titre (varchar)
- description (text)
### Table: stats_visites
- ip (varchar, primary key)
- date_visite (datetime)
- pages_vues (int)
- Country (varchar)
- City (varchar)
### Table: tours
- idtour (int, primary key, auto_increment)
- title (varchar)
- description (text)
- city (varchar)
- depart_time (datetime)
- image_url (varchar)
- quote (text)
- empty_places (int)
- price (decimal)
- region (varchar)
- idcateg (int)
### Table: travel_tickets
- ticket_id (int, primary key, auto_increment)
- user_name (varchar)
- travel_type (varchar)
- departure_city (varchar)
- destination_city (varchar)
- departure_date (date)
- departure_time (time)
- arrival_date (date)
- arrival_time (time)
- utility_type (varchar)
- price (decimal)
- category_id (int)
- tour_title (varchar)
- tour_city (varchar)
- tour_date (date)
### Table: tvg
- id (int, primary key, auto_increment)
- ip (varchar)
- datev (date)
- country (varchar)
- city (varchar)
### Table: tvgtable
- id (int, primary key, auto_increment)
- depart (varchar)
- destination (varchar)
- depart_date (date)
- arrival_date (date)
- depart_hour (time)
- arrival_hour (time)
- capacite (int)
- way (varchar)
- price (decimal)
### Table: users
- UserName (varchar, primary key)
- Email (varchar, unique key)
- Pass (varchar)
- datenaissance (date)
- Profilepic (varchar)
- Admin (tinyint)
- ProfilePicture (varchar)
### Table: voyage
- idvoyage (int, primary key, auto_increment)
- villedepart (varchar)
- villearriver (varchar)
- datedepart (date)
- heuredepart (time)
- heurearrivee (time)
- outile (varchar)
- capacite (int)
- prix (decimal)
- Type (varchar)
- description (varchar)
- idcateg (int)











## Author 
+ [YOUSRA -:octocat:- BDFT](https://linktr.ee/bdftyousra) 

---


## WARNING!!
```diff
- This repo is done as a school assignment. Beware of copying my responses.
- I recommend you  to read resources and come up with your own solutions </br> instead. Feel free to reach out for help!
- This repo may contain some errors. If you notice any, </br> please add a pull request.
```
