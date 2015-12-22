# Comment-Section
This is a PHP/MySQL app that I previously hosted on my website cslearner.com.  I have removed this specific feature of my website so I'm uploading the old code now.  This is a basic CRUD web app that allowed users to create comments and then see comments that others had left.  I didn't have an UPDATE or DELETE feature for this specific project.  In addition I removed the login information and replaced it with dummy data such as localhost, root, and no password.  This means if anyone wanted to actually use the code you would need to change that.  In addition I didn't include the full SQL to create the MySQL database so you may need to manually create the database using PHPmyAdmin.  In addition this particular version of the web app didn't include strip_tags() which meant this version and the version I initially created was weak against XSS(Cross-Site-Scripting).  If anyone wanted to actually use this you would want to use htmlspecialchars() on the user's input to sanitize against XSS or strip_tags() whenever you printed the output to prevent XSS.  I enjoyed this project and learned a lot.  