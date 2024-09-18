
# Kamuingi Self Help Group System

Kamuingi Self Help Group is a community-driven platform designed to help members manage contributions and support each other in times of need. The system enables family members to record donations made after a member has passed away, track donation history, and impose penalties for members who fail to contribute.

## Features

- **Member Registration and Management**: 
  - Register members and manage their personal details.
  - Track donation records and contribution history.
  
- **Donations and Penalties**:
  - Family members can log in and record donations after a member has passed away.
  - Automatic tracking of member donations, with penalties imposed after failing to donate three times.
  
- **Event Notifications**:
  - Notify members of donation events, including those for funerals and other needs.
  
- **Report Generation**:
  - Generate reports on member contributions, penalties, and outstanding balances.

## System Architecture

The system is built with the following key technologies:

- **Backend**: 
  - Powered by Laravel, the backend handles user management, event logging, and communication between different system modules.
  
- **Database**:
  - Utilizes MySQL for storing member data, donation history, and penalties.
  
- **Frontend**:
  - The frontend is designed using Blade templates, offering a clean and intuitive interface for members to interact with the system.

## Getting Started

To get started with setting up the Kamuingi Self Help Group system, follow these steps:

### Prerequisites

- PHP 8.0+
- Composer
- MySQL

### Installation

1. Clone the repository:

    git clone https://github.com/kabwoyke/kamuingi-group.git

   
2. Navigate to the project directory:
  
    cd kamuingi-self-help
    
   
3. Install dependencies:

    composer install
  

4. Copy the `.env` file and set up your environment variables:

    cp .env.example .env

    Update the following environment variables:

    DB_DATABASE=kamuingi_db
    DB_USERNAME=your_db_username
    DB_PASSWORD=your_db_password
 

5. Generate the application key:

    php artisan key:generate


6. Run the database migrations and seeders:

    php artisan migrate --seed


7. Serve the application:

    php artisan serve


    Your system should now be accessible at `http://localhost:8000`.

## Usage

- **Register Members**: Admins can register new members and update their information.
- **Record Donations**: After a death, designated family members can log into the system and record donations.
- **View Penalties**: Admins can track members who have failed to contribute and view automatically applied penalties.
- **Generate Reports**: Generate reports of all donation events and penalties.

## Contribution

We welcome contributions to the Kamuingi Self Help Group system. If you have suggestions or improvements, feel free to open an issue or submit a pull request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
