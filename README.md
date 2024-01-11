# Accident-Notification-Webapp
# NIKS Safe Driving

NIKS Safe Driving is a web application designed to enhance road safety by providing real-time information about accident-prone zones, nearby hospitals, and enabling users to share their emergency contacts and location with a single click.

## Features

**Accident-Prone Zones:** The application alerts users when they enter accident-prone zones, enhancing awareness about potentially risky areas.

**Hospital Locations:** Displays the locations of nearby hospitals for quick access in case of emergencies.

**User Information:** Allows users to register and provide essential details such as name, phone number, emergency contacts, blood group, and vehicle number.

**SMS Alert:** In case of an accident, the application sends an SMS alert to the provided emergency contacts with the user's location.

## Technologies Used

**Frontend:** HTML, CSS, JavaScript, Leaflet.js for maps
**Backend:** PHP, Python (Flask) for SMS functionality
**Database:** MySQL

1. Set up the database by executing the SQL script provided in database_setup.sql.

2. Configure the Twilio API credentials in send_sms.py for SMS functionality.

3. Run the Flask server for SMS functionality:
   
cd server
python app.py
Open the application by running a local server for the frontend.

Usage
Access the application through a web browser.
Register your details in the user registration form.
Explore the ride, locate, user, and near me functionalities.
Stay informed about accident-prone zones and nearby hospitals.
