#**Supervisor Allocation Module**

The importance of a proper management system is to manage a certain workflow in an organization becomes a lot smoother and completely structured at the same time, which it could also be applied on this project which is titled as “Supervisor Allocation Module”. The project’s main purpose is to make the interaction between students and lecturers become much more organized than its previous state, and also to help the coordinator to be able to manage the flow of course without stumbling to any unnecessary problems. Since there is no centralized platform for Management System in UAF, many students have been suffering from selecting suitable supervisors for their project by not being able to choose them in time as they are unable to determine the targeted supervisors (lecturers) availability. Afterwards, the targeted supervisor has to recommend the students a bunch of alternative lecturers that could be their supervisor for the project and if the targeted supervisor is somehow do not manage to help the students as quickly as possible, the coordinator will try to handle the situation by doing the same thing, but a little bit quicker. The objective is to make a certain management system that has the capability to conduct session including finding suitable supervisors for students without any difficulties. Agile methodology is chosen for this project as its development life cycle is the shortest and most efficient methods for solve the problems through the implementation of the project. The results that came from the project’s implementation indicates that students can finally apply for their preferred supervisor through the module, supervisors can opt to choose whether to accept or reject a student based on their quota which will be shown to both of the students and supervisor in the module, and coordinator can finally assign students to certain supervisors and also edit student’s and supervisor’s data if need be.

#**Prerequisites:**

##**Web server with PHP support:** Ensure you have a web server like Apache or Nginx installed and configured to run PHP scripts.
##**MySQL database server:** A MySQL database server needs to be running on your system.
##**MySQL database and user:** Create a dedicated MySQL database for your supervisor allocation module and a user with appropriate permissions to access it.

#**Installation Steps:**

**Clone or Download the Project:** Obtain the project files. You can either clone the Git repository if it's hosted on GitHub or download the project files directly.

**Configure Database Connection:** Locate the file responsible for establishing the database connection (likely named config.php or similar). Update the following details:

**DB_HOST:** Replace this with the hostname or IP address of your MySQL server.
**DB_NAME:** Replace this with the name of the database you created for the module.
**DB_USER:** Replace this with the username you created for accessing the database.
**DB_PASSWORD:** Replace this with the password for the database user.
**Import Database Schema:**  Your project might include a file containing the database schema for the supervisor allocation module (likely named schema.sql or similar). If provided, import this file into your newly created MySQL database using a tool like phpMyAdmin or the MySQL command line.

**Upload Project Files:**  Upload the project files to your web server's document root directory. This is typically the public_html or htdocs directory depending on your web server configuration.

**Configure Permissions:** Ensure that the web server user has read and execute permissions for the project directory and its contents. This allows the server to access and run the PHP scripts.

**(Optional) Configure Virtual Host:** If you're using Apache and want to access the application through a specific URL (e.g., http://supervisorallocation.yourdomain.com), you might need to set up a virtual host configuration. Refer to your web server documentation for details.

**Access the Application:**  Open a web browser and navigate to the URL where you uploaded the project files (e.g., http://localhost/your-project-folder/). You should see the supervisor allocation module's login or main page.

