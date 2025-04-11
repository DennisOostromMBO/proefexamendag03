# Bowlingcentrum Application Architecture

This document provides an overview of the architecture of the Bowlingcentrum application.

## Architecture Overview

The application follows a service-oriented architecture with stored procedures for all database interactions. This document includes UML class diagrams and Entity-Relationship Diagrams (ERD) to help visualize the architecture.

### Key Components

1. **Controllers**: Handle HTTP requests and delegate business logic to services
2. **Services**: Handle business logic and interact with the database via stored procedures
3. **Models**: Define data structure and relationships
4. **Stored Procedures**: Encapsulate all SQL and database operations

## UML Class Diagram

The UML Class Diagram shows the relationships between the different classes in the application:

- **ReserveringController**: Handles HTTP requests for reservations
- **DatabaseService**: Provides an interface to interact with the database via stored procedures
- **Models**: Define the data structure and relationships

## Entity-Relationship Diagram (ERD)

The ERD shows the database schema and relationships between tables:

- **persoons**: Stores information about people (customers, employees, etc.)
- **type_persoons**: Defines the types of people (customer, employee, guest)
- **reserveringen**: Stores reservation information
- **openings_tijds**: Defines the opening times
- **baans**: Stores information about bowling lanes
- **pakket_opties**: Defines the package options
- **reserveringstatussen**: Defines the statuses for reservations

## Stored Procedures

The application uses the following stored procedures:

1. **GetConfirmedReservations**: Gets all confirmed reservations up to a specific date
   - Parameters: cutoff_date (DATE)
   
2. **GetReservationDetails**: Gets details for a specific reservation
   - Parameters: reservation_id (INT)
   
3. **GetAllPakketOpties**: Gets all active package options
   - Parameters: None
   
4. **UpdateReservationPackage**: Updates a reservation's package option with validation
   - Parameters: 
     - reservation_id (INT)
     - new_pakketoptie_id (INT)
     - result_message (OUT VARCHAR)

## Business Logic

The application includes the following business logic:

1. **Package options validation**: The "Vrijgezellenfeest" package cannot be selected for reservations with children.
2. **Date filtering**: Reservations can be filtered by date.

## User Interface Flow

1. **Homepage**: Links to the reservation overview
2. **Reservation Overview**: Shows all confirmed reservations
   - Filter by date
   - Click on edit button to change package option
3. **Edit Package Option**: Change the package option for a reservation
   - Select a new package option
   - Click "Wijzigen" to save changes

## Conclusion

The Bowlingcentrum application is built with a focus on maintainability and performance, using stored procedures for all database operations to ensure optimal performance and security.
