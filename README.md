# Contact Management Application

## Table of Contents
- [Introduction](#introduction)
- [Considerations](#considerations)
- [Additional Requirements](#additional-requirements)

## Introduction

This is a simple contact management application built using the Laravel framework. The purpose of this application is to manage a list of contacts, each of which has four fields: ID, Name, Contact, and Email Address. This README provides some important considerations and additional requirements for the application's development.

## Considerations

1. **Contact Fields:**
   - **ID:** A unique identifier for each contact.
   - **Name:** Should be a string of any size greater than 5 characters.
   - **Contact:** Should consist of 9 digits.
   - **Email Address:** Should be a valid email address.

2. **Index Page:**
   - Each row on the index page should display the contact's information.
   - Each row should have a link to edit the contact.
   - Each row should have a button to soft delete the contact, utilizing Laravel's soft delete feature.

3. **Contact Details Page:**
   - The contact details page should display all the fields of the contact.
   - It should include links to edit the contact and to soft delete the contact.

4. **Uniqueness:**
   - Contact and email address should be unique. Two contacts cannot have the same contact number or email address.

5. **Database Structure:**
   - Any necessary database structure information or data should be added using migrations and/or seeds. This ensures that the database is set up correctly and can be easily replicated.

6. **Laravel Native Features:**
   - Always use Laravel's native features when possible, including routes, controllers, form validation rules, soft deletes, and other built-in functionalities. This ensures a consistent and efficient development process.

## Additional Requirements

In addition to the considerations mentioned above, the following requirements should be implemented if time permits during the development and testing of the application:

1. **Authentication:**
   - Allow anyone to view the list of contacts, but restrict access to other features (editing and deleting) to authenticated users. You can create a static user account for this purpose.
