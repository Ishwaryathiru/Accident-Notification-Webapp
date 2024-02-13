from flask_cors import CORS
from twilio.rest import Client
from flask import Flask, request, jsonify
import requests

app = Flask(__name__)
CORS(app)

# Your Twilio credentials
SID = 'ACaf51e5854a5c526'
token = '0c469fe8ae18'
ct = Client(SID, token)

@app.route('/send_sms', methods=['POST'])
def send_sms():
    try:
        # Retrieve the emergency_contacts, username, latitude, and longitude from the AJAX request
        data = request.form.to_dict()
        emergency_contacts = data['emergency_contacts']
        user_name = data['user_name']
        lat = float(data['lat'])
        lon = float(data['lon'])

        # Reverse geocode the latitude and longitude to get a human-readable address
        address = reverse_geocode(lat, lon)

        # Twilio client

        # Assuming emergency_contacts contains a valid phone number
        emergency_contacts_number = emergency_contacts

        # Send an SMS message with the username and location information
        message_body = f"An accident has occurred involving {user_name} at {address}. Respond immediately."
        message = ct.messages.create(
            to=emergency_contacts_number,
            from_='+13344543523',  # Your Twilio phone number
            body=message_body
        )

        print(f"SMS sent successfully to {emergency_contacts_number}")
        return 'SMS sent successfully'

    except Exception as e:
        # Log the error
        print(f"Error sending SMS: {str(e)}")
        return 'Error sending SMS'

def reverse_geocode(lat, lon):
    # Make a request to a reverse geocoding service (OpenStreetMap Nominatim)
    url = f'https://nominatim.openstreetmap.org/reverse?lat={lat}&lon={lon}&format=json'
    response = requests.get(url)
    data = response.json()
    
    # Extract the address components and construct a human-readable address
    address_components = data.get('address', {})
    
    # Include additional components for more detail
    address = ', '.join([address_components.get(key, '') for key in ['road', 'suburb', 'city', 'state', 'country']])
    
    return address

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
