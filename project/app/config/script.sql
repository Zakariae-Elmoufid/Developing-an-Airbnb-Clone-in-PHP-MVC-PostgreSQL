CREATE TYPE role_enum AS ENUM ('Admin', 'Owner', 'Traveler');

CREATE TABLE Role (
    id SERIAL PRIMARY KEY,
    title role_enum NOT NULL
);

CREATE TYPE user_status AS  ENUM('active', 'suspend', 'delete') ;

CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL ,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profilePicture VARCHAR(255),
    status user_status  DEFAULT 'active'  
);


CREATE TABLE Admin (
    id SERIAL PRIMARY KEY,
   user_id INT UNIQUE,
    FOREIGN KEY (user_id) REFERENCES "users"(id) ON DELETE CASCADE
);



CREATE TABLE "Owner" (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE,
    FOREIGN KEY (user_id) REFERENCES "users"(id) ON DELETE CASCADE
);

CREATE TABLE "Traveler" (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE,
    FOREIGN KEY (user_id) REFERENCES "users"(id) ON DELETE CASCADE
);



create type sender  as ENUM ('owner_id','traveler_id');
create type receiver  as ENUM ('owner_id','traveler_id');
create type message_enum as ENUM('sent', 'read', 'deleted');

CREATE TABLE Messages (
    id SERIAL PRIMARY KEY,
	owner_id int,
	traveler_id int,
	 FOREIGN KEY (owner_id) REFERENCES "Owner"(id) ON DELETE CASCADE,
	 FOREIGN KEY (traveler_id) REFERENCES "Traveler"(id) ON DELETE CASCADE,
    senderId sender NOT NULL,
    receiverId receiver NOT NULL,
    content TEXT NOT NULL,
    sentAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status message_enum DEFAULT 'sent' -- Changed status to ENUM
);

CREATE TABLE Category (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL UNIQUE
);

create type accommodation_enum  as ENUM('available', 'booked');

CREATE TABLE Accommodation (
    id SERIAL PRIMARY KEY,
	owner_id INT ,
	foreign key (owner_id) references "Owner"(id),
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category_id INT,
	foreign key (category_id) REFERENCES Category(id),
    address TEXT NOT NULL,
    basePrice FLOAT NOT NULL,
    maxGuests INT NOT NULL,
    photos TEXT[],    
    status  accommodation_enum DEFAULT 'available', 
    isValidated BOOLEAN DEFAULT FALSE
);


create type booking_enum  as ENUM('active', 'cancelled');

CREATE TABLE Booking (
    id SERIAL PRIMARY KEY,
    accommodation_id INT,
	foreign key (accommodation_id) REFERENCES Accommodation(id),
    checkInDate DATE NOT NULL,
    checkOutDate DATE NOT NULL,
    numberOfGuests INT NOT NULL,
    totalPrice FLOAT NOT NULL,
    status booking_enum  DEFAULT 'active'
);

create type review_enum  as ENUM('approved', 'pending', 'rejected');

CREATE TABLE Review (
    id SERIAL PRIMARY KEY,
    booking_id INT,
	foreign key (booking_id) REFERENCES Booking(id),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status review_enum DEFAULT 'pending' 
	);


create type payment_enum  as  ENUM('pending', 'completed', 'failed');
CREATE TABLE Payment (
    id SERIAL PRIMARY KEY,
    booking_id INT,
	foreign key (booking_id) REFERENCES Booking(id),
    amount FLOAT NOT NULL,
    status payment_enum DEFAULT 'pending',  
    paymentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    transactionId VARCHAR(255) UNIQUE
);

create type promotion_enum  as   ENUM('seasonal', 'special', 'limited-time');
CREATE TABLE Promotion (
    id SERIAL PRIMARY KEY,
    accommodation_id INT,
	foreign key  (accommodation_id) REFERENCES Accommodation(id),
    discountPercentage FLOAT CHECK (discountPercentage BETWEEN 0 AND 100),
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    type promotion_enum  DEFAULT 'seasonal'
);