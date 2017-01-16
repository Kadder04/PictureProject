# PictureProject
##### A Web-Project created by Kadder04 in his leasure time.

#### Current Project: complete refactoring
#### Progress Bar: complete refactoring [====>.................] 34%

#### Known Errors to fix:
    - Registration doesn't work.
    - Errors on upload.
### Update Log

##### 2.2.0 - 16.01.17

    - Refactored gallery.php completely
    - Suppressed warnings on gallery.php, take the suppression away asap after fix.(!)
    - Refactored upload.php more or less

##### 2.1.0 - 13.01.17

    - Fixed Bug: "bildergalerie" click in navbar doesn't scroll to navbar.
    - Refactored index.php completely
    - Added head.php in order to import all libraries only once.
    - Added footer.php in order to style and write footer only once.
    - Refactored guestbook.php completely

##### 2.0.0 - 13.01.17

    - Updated README.md
    - Refactored stylesheet and called it stylesheet.css
    - Exchanged style.css for stylesheet.css in index.html
    - Implemented jquery.easing.min.js for smooth scrolling
    - Refactored index.php (ToDo: css for forms)

### Directory Info
##### - gallery.php
    Takes you to the actial gallery.php.
    Provides functionality to upload pictures.
##### - guestbook.php
    Contains the guestbook.php file and html markup for the site.
    Provides functionality to add comments in the guestbook.
##### - index.php
    Contains the landing page of the project.
##### - login.php
    Is called from index.php.
    Provides login check.
    Links to LoginFailed.php if login failed. -> Refreshes to Index.php after 0.1 Seconds.
##### - LoginFailed.php
    Contains Error message if Login is not successful.
##### - logout.php
    Provides Logout fuctionality.
##### - navigation.php
    Unfinished navigation bar. Not currently used.
##### - register.php
    Provides Registration functionality.
    Cannot Register!
##### - upload.php
    Provides upload functionality.
    Generates Errors on upload!
###### Good to know
    Scrolling to a div only works if the target is a div that contains a picture or text e.g: "section_panel" and doesn't work with "section".

