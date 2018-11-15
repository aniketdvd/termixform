# termixform
### What is TermixForm?
Termix Form is a terminal like form module made for Drupal 8. This is a basic form that takes your name, age, DOB and gender.
This form tells the user if important fields are left.
This has a funny validation that acts when user gives inappropriate age (<=0 or >110) TRY IT OUT :P

### How do I use it?
Clone the repo or Download its archive and extract it in your Drupal Site's module folder.
Go to extend and enable it from there only.

### How do I see the form?
After enabling the form you will go to ```youSite/terminal-form```.
Here you can make the form work.

# More info
### Service used
This Drupal 8 form uses the Drupal's messenger service for displaying message when submitted
###### Why not drupal_set_message()?
This method is deprecated. Drupal's messenger service feels more friendly when used in our code.
