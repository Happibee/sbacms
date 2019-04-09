For developers/ team members of SBACMS,
Here are some notes on what I changed in the system and comments/best practices you MAY use not only in making SBACMS, but in future development as well :). To see specifics regarding lines of code I modified/added, check commits :)

Fixes/Major Changes Made in SBACMS:
    Fixes:
        1. Directory Structure Change - organized the files and resources.
        2. Session bugs.

    New Functions:
        Employee
        1. View Appointments
        2. Accept Penging Requests
        3. Reject Pending Requests

        Manager
        1. View Services
        2. Create, Update, Delete, Archive Services
    
    Other:
        1. Made login page one for all users.
        2. Password encryption during registration.
        3. Registration

    Database Changes (Update database schema on your document)
        1. Appointment Table
        - updated column names to standardize naming conventions
        - removed unnecessary fields
        - changed status field to string since the appointment status' possible values may be: 1. Pending 2. Accepted/Whatever term you use 3. Complete/Done/Whtvr.

        2. Service Table
        - added new field - ARCHIVE, for archiving function purposes.

        3. Added service_type Table
        - for database normalization purposes.

        4. Changed database naming conventions to conform to some database management best practices.
        i.e. changed firstName to first_name 

        5. Separated User Account (username, email, pass, etc.) from user info.
        WHY? Consider that most of the salon's clients would be walk-in, which means they do not have account credentials but the salon will record the customer's name and other info when they schedule the appointments.
        **All customers can have user info but not all need to have user credentials.
        **user_info table can have rows w/ no username (for walk-in clients)
        ***PLEASE LET ME KNOW WHAT YOU THINK OF THIS ITEM.

----

Comments/ Best Practices (Standards)*/ Personal Best Practices**:

1. Multiple/ Unecessary file calls
Noticed that some file calls should only be made once, but they were unnecessarily called multiple times.
i.e. header.php calls database.php and it is imported in guesthome.php (and other files), THERE IS NO NEED TO CALL database.php AGAIN IN guesthome.php SINCE YOU ARE IMPORTING header.php in guesthome.php
** Take advantage of the reusability of your resources

2. Javascript files are placed in header file.
* PUT JAVASCRIPT FILES IN THE FOOTER for the site to load faster. It may not be noticeable when you're running in local but consider the speed of loading the resources once the site is deployed.

3. There are a few stray files that are not even used.
* Know what each file has to do, each file should serve a purpose.
** Make one folder for all test files (i.e. Made a 'playground' folder for test/sample files).

4. Organize and collate styles.
Noticed that your style rules are "makalat". Some are declared in the bottom of the page or at the top.
** It's better to have a separate file for your style rules, for organization and readability purposes.

5. Indentions.
Your codes do have indentions but it is inconsistent, some follow the 2-space tab, some follow 5-space tab.
** Be consistent in your indentions.
** Easier to read code (and more preferred by most developers) if you use the 2-space tab since the normal tab generates tabs that are too big.
***WILL DO THIS DURING LATE PARTS OF DEV

6. Page Titles
**Add titles because the url (i.e. localhost/sbacms/views/contact.php) appears on the browser tab, not good to see.

7. Why are you calling footer.php before your page content. Was observed in a some files.

8. You do not need to enlcose php blocks inside <div> tags.
Some of your php blocks are inside div tags and div tags contain nothing aside from the php blocks.

9. Clean the code you copy paste.
i.e. The placeholders in the registration pages all says "first name".

------------

Design Comments (Mga personal opinion langs haha, doesn't really need to be considered)
- Overall, UI if pretty nice. Good job!

1. Be consistent with the image size, lalo na sa carousel.
Carousel looks nice, but image sizes are not uniform. (for old carousel only, was fixed)

2. Some image sizes are too big. They fill up the entire screen if you're scrolling. Yung ibang images, you have to scroll a bit because they fill a very large part of the screen.

3. Be consistent with fonts and font sizes as well.

----------

TO DO: PLEASE ADD SPECIFIC FUNCTIONS THAT ARE STILL LACKING (i.e. Generate Report)
** I only tried to complete the items you have to show for your defense (some transaction and CRUD items) did not really consider UI na rin muna haha srry, sa next few weeks nalang yun after defense. Further code optimization and improvements still have to be done. 

Some of them are the following (I encourage other team members to add to this as you see fit or comment on some items if you have questions or other ideas that may be considered more appropriate):

1. Other remaining functions (reports, etc.)/ other items not marked as complete during first defense. 
    - Generate Reports
    -- please add other unfinished items

2. Further normalization of database tables.

3. Separate modules that are static and the same across sites and merge into one file then just import for page that need same content.
*Dami kasing paulit ulit lang na content, pagisahin nalangs.

4. ADD PAGE TITLES to pages

5. Remove all internal stylesheets and transfer to external.

6. FORM VALIDATION. VALIDATE ALL INPUT. CONSIDER USING REGEX (Regular Expressions)

7. CODE CLEAN-UP/ OPTIMIZATION

8. UI/UX Improvements

9. File access security - Forbid access to directories. (i.e. User should not be able to see contents of 'http://localhost/sbacms/classes/' directory)

10. Fill database with actual data -> gather from salon.



-- Lysle B. 