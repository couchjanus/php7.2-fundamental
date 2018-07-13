<?php
// ContactController.php

class ContactController
{
    // Class properties and methods go here   
    public function __construct()
    {
        render('home/contact', ['title'=>'Contact <b>Our Cats</b>']);
    }

}
