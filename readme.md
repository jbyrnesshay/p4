# Picnook (P4 for DWA15) by Joachim Byrnes-shay

# Live URL
<http://p4.midnightoil.me>

# P4 planning doc URL
https://docs.google.com/document/d/1kOdVyH9gjhuJE3ep7HsyTEUcpVRdQ85i1sHSZW-f6a0/edit?usp=sharing

## Description
an app to select a photo, and configure a frame and matting for it.
then store it in user wishlist, which is editable.

## Demo

## list/details of CRUD
CRUD in the app is centered around the user's ability to configure frame/mat settings which are 
attached to a picture, simulating a user's browsing of an online art store.
User creates an object consisting of frame width, frame color, mat width, mat color, after selecting a 
specific image.  

* create- lines 62-87 of create(), PicController.php, lines 95-130 of store(), PicController.php, user 
eperience-  click on image on main page to 
begin, 
configure settings, store by clicking submit, see the item added to wishlist on the right side  of the 
screen

* read -  index function of PicController.php, reads all pics from the database by default, displays 
them (this is the homepage);  edit method of PicController.php, lines 148-162 in PicContoller.php, 
reads from the pivot table on line 159 where I have some additional fields to store the user 
configuration options for their picture.  The effect can be seen when user edits an item on their 
wishlist, where their user settings are read and used to control the display of the resulting frame and 
mat size and colors on the resulting page in the user selection form window on the left.  NOTE:  
wishlist also shows frame color and a representation of frame size, not correctly to scale, but only 
displays white for padding, due the time consuming process of adding that feature within the 
limitations (complications with how displayed versus the nature of the padding, using :before pseudo). 

* update - update method of PicController.php, lines 171-190, $pic->update($data) on line 188 saves the 
users updated selections to the config fields on the pivot table.  User experience is upon arriving at 
the edit page, make new settings, click save, observe a visual represenation of the updated frame size 
and color in the wishlist window on the right.

*delete - destroy method of PicController.php, lines 200-207;  when user clicks delete button on 
wishlist item, routing occurs through delete/pics{$item}, selected and deleted in lines 203-204 

## Details for teaching team
Login required.  seeded for jill@harvard.edu and jamal@harvard.edu, 'helloworld'

## Outside code
none

## Credits
all images from Pexels at Pexels.com, licensed under the Creative Commons Zero license
free for personal and commercial use, attribution is not required

technique for using javascript to style :before pseudo-element is derived from
http://stackoverflow.com/questions/2212807/how-can-i-change-the-style-of-the-document-via-javascript

Susan Buck for ajax search code from lecture, which i borrowed for a minor feature, simple demo to 
include in my project
