# Negar.Ighani_FinalProject.Backend
Application to Manage Work Tasks

Project Overview

The project aims to create a Task Management application. It includes functionalities such as user registration, login, task creation and task management. The application follows a client-server architecture, where the backend handles the business logic and data management, and the frontend interacts with the user.

Technologies Used

The project utilizes the following technologies:

•	Backend:

o	PHP: A server-side scripting language used for handling backend logic.

o	MySQL: A relational database management system used for storing and managing data.

•	Frontend:

o	React: A JavaScript library for building user interfaces.

o	Redux: A predictable state container for managing the application's state.

o	HTML and CSS: Markup and styling languages for creating the user interface.

o	FontAwesome: A library of icons used for visual representation.

Backend Structure

The backend is developed using PHP and follows the MVC (Model-View-Controller) architectural pattern. The project structure consists of the following components:

-	index.php: The entry point of the backend application. It handles the routing and dispatches requests to the appropriate controller.

-	Controllers: The controllers handle the request processing and interact with the models and helpers to perform the necessary actions. In this project, we have PersonController and TaskController.

-	Models: The models represent the data structures and handle the database interactions. In this project, we have Person model and Task model.

-	Helpers: The helpers contain functions that assist in performing common tasks. In this project, we have PersonHelper class that handles database connectivity and operations related to the Person model and TaskHelper that handled the operations related to Task.

-	DBConnector: The DBConnector class provides methods for establishing a database connection and executing queries.

Database Models

The database models are designed to store and manage the application's data. In this project, we have two main models:

-	Person: This model represents a user of the application. It contains fields such as id, first_name, last_name, username, password, and role.

-	Task: This model represents a task in the application. It contains fields such as id, title, description, and status.

The Person and Task models are stored in the MySQL database using the person and task tables, respectively. The database schema includes the necessary fields and relationships to store and retrieve the data effectively.

Frontend Structure

The frontend is developed using React and follows a component-based architecture. The project structure consists of the following directories and files:

- App.css: CSS file for styling the App component.
- App.js: The root component of the application that renders other components.
- index.css: CSS file for styling the index.html file.
- index.js: The entry point of the frontend application that renders the App component.
- components:
  	- Header.js: Component responsible for rendering the header of the application.
  	- style.css: CSS file for styling the components.
 	- TaskItem.js: Component representing a single task item.

- pages:
  	- style.css: CSS file for styling the pages.
 	 - Edit:
    		- index.js: Component for editing a task.
  	- Home:
    		- index.js: Component representing the home page of the application.
  	- Login:
    		- index.js: Component for the login page.
  	- SignUp:
    		- index.js: Component for the signup page.

- redux:
  	- action:
    		- action-types.js: File defining the action types used in the application.
    		- actions.js: File containing action creators.
    		- taskActions.js: File containing task-related action creators.
  	- reducer:
   		 - combined-reducers.js: File combining multiple reducers into a single rootReducer.
    		- taskReducer.js: File containing the reducer for managing tasks.
 	 - store:
    		- config-store.js: File configuring the Redux store.

- router:
  - index.js: File configuring the application routes.
