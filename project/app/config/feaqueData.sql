<<<<<<< HEAD
-- Insert sample roles
INSERT INTO Role (title) 
VALUES ('Admin'), ('Owner'), ('Traveler');

-- Insert sample users (assuming 3 roles)
INSERT INTO Users (username, email, password, profilePicture, status, role_id) 
VALUES 
('admin1', 'admin1@example.com', 'password123', 'profile1.jpg', 'active', 1),
('owner1', 'owner1@example.com', 'password123', 'profile2.jpg', 'active', 2),
('traveler1', 'traveler1@example.com', 'password123', 'profile3.jpg', 'active', 3),
('admin2', 'admin2@example.com', 'password123', 'profile4.jpg', 'active', 1),
('owner2', 'owner2@example.com', 'password123', 'profile5.jpg', 'active', 2),
('traveler2', 'traveler2@example.com', 'password123', 'profile6.jpg', 'active', 3),
('admin3', 'admin3@example.com', 'password123', 'profile7.jpg', 'active', 1),
('owner3', 'owner3@example.com', 'password123', 'profile8.jpg', 'active', 2),
('traveler3', 'traveler3@example.com', 'password123', 'profile9.jpg', 'active', 3),
('admin4', 'admin4@example.com', 'password123', 'profile10.jpg', 'active', 1);

-- Insert sample Admins
INSERT INTO Admin (user_id) 
SELECT id FROM Users WHERE role_id = 1 LIMIT 4;

-- Insert sample Owners
INSERT INTO "Owner" (user_id) 
SELECT id FROM Users WHERE role_id = 2 LIMIT 3;

-- Insert sample Travelers
INSERT INTO "Traveler" (user_id, phone) 
SELECT id, '123-456-7890' FROM Users WHERE role_id = 3 LIMIT 3;

-- Insert sample Categories
INSERT INTO Category (title)
VALUES 
('Luxury'), 
('Budget'), 
('Standard');

-- Insert sample Accommodations
INSERT INTO Accommodation (owner_id, title, description, category_id, address, basePrice, maxGuests, photos, status, isValidated)
VALUES
(1, 'Luxury Villa', 'A beautiful luxury villa', 1, '123 Luxury St.', 500.0, 6, ARRAY['photo1.jpg'], 'available', TRUE),
(2, 'Budget Inn', 'Affordable budget accommodation', 2, '456 Budget Rd.', 50.0, 2, ARRAY['photo2.jpg'], 'available', TRUE),
(3, 'Standard Hotel', 'Comfortable standard hotel', 3, '789 Standard Blvd.', 150.0, 4, ARRAY['photo3.jpg'], 'available', TRUE),
(1, 'Beach Resort', 'A resort by the beach', 1, '321 Beach Ln.', 350.0, 5, ARRAY['photo4.jpg'], 'available', TRUE),
(2, 'Mountain Cabin', 'A cozy cabin in the mountains', 2, '654 Mountain Dr.', 100.0, 3, ARRAY['photo5.jpg'], 'available', TRUE),
(3, 'City Apartment', 'An apartment in the city center', 3, '987 City Ave.', 200.0, 4, ARRAY['photo6.jpg'], 'available', TRUE),
(1, 'Forest Lodge', 'Lodge surrounded by forest', 1, '111 Forest Rd.', 400.0, 6, ARRAY['photo7.jpg'], 'available', TRUE),
(2, 'Suburban House', 'A house in a quiet suburban area', 2, '222 Suburb Ln.', 150.0, 4, ARRAY['photo8.jpg'], 'available', TRUE),
(3, 'Downtown Studio', 'A studio in the downtown area', 3, '333 Downtown St.', 180.0, 2, ARRAY['photo9.jpg'], 'available', TRUE),
(1, 'Desert Retreat', 'A retreat in the desert', 1, '444 Desert Blvd.', 550.0, 5, ARRAY['photo10.jpg'], 'available', TRUE);

-- Insert sample Bookings

INSERT INTO Booking (accommodation_id, checkInDate, checkOutDate, numberOfGuests, totalPrice, status,traveler_id)
VALUES
(1, '2025-02-01', '2025-02-07', 2, 1000.0, 'active',1),
(2, '2025-02-05', '2025-02-10', 1, 50.0, 'active',2),
(3, '2025-02-10', '2025-02-15', 3, 450.0, 'active',3);

-- Insert sample Reviews
INSERT INTO Review (booking_id, rating, comment, status)
VALUES
(34, 5, 'Excellent stay!', 'approved'),
(32, 3, 'Good, but could be better.', 'approved'),
(33, 4, 'Nice place, but a bit noisy.', 'approved'),
(33, 5, 'Perfect for our family!', 'approved'),
(32, 2, 'Too small for the price.', 'pending'),
(34, 4, 'Great location, enjoyed the stay.', 'approved'),
(32, 5, 'Amazing experience, would recommend!', 'approved'),
(33, 3, 'It was fine, but expected more amenities.', 'pending'),
(32, 5, 'Wonderful experience!', 'approved'),
(34, 4, 'Great value for the price.', 'approved');

-- Insert sample Payments
INSERT INTO Payment (booking_id, amount, transactionId, status)
VALUES
(1, 1000.0, 'TX123', 'completed'),
(2, 50.0, 'TX124', 'completed'),
(3, 450.0, 'TX125', 'pending'),
(4, 1400.0, 'TX126', 'completed'),
(5, 200.0, 'TX127', 'failed'),
(6, 300.0, 'TX128', 'completed'),
(7, 1600.0, 'TX129', 'completed'),
(8, 150.0, 'TX130', 'pending'),
(9, 400.0, 'TX131', 'completed'),
(10, 1750.0, 'TX132', 'completed');

-- Insert sample Promotions
INSERT INTO Promotion (accommodation_id, discountPercentage, startDate, endDate, type)
VALUES
(1, 10.0, '2025-02-01', '2025-02-15', 'seasonal'),
(2, 5.0, '2025-02-05', '2025-02-20', 'special'),
(3, 15.0, '2025-02-10', '2025-02-25', 'limited-time'),
(4, 20.0, '2025-02-11', '2025-02-20', 'seasonal'),
(5, 25.0, '2025-02-15', '2025-03-01', 'special'),
(6, 30.0, '2025-02-25', '2025-03-10', 'limited-time'),
(7, 10.0, '2025-03-01', '2025-03-15', 'seasonal'),
(8, 5.0, '2025-03-05', '2025-03-20', 'special'),
(9, 15.0, '2025-03-10', '2025-03-25', 'limited-time'),
(10, 20.0, '2025-03-15', '2025-03-30', 'seasonal');
=======
-- Insert into Role table
INSERT INTO Role (title) VALUES
('Admin'),
('Owner'),
('Traveler');

-- Insert into Users table
INSERT INTO Users (username, email, password, profilePicture, phone, role_id) VALUES
('john_doe', 'john@example.com', 'password123', 'profile1.jpg', '1234567890', 1),
('jane_smith', 'jane@example.com', 'password456', 'profile2.jpg', '0987654321', 2),
('alice_williams', 'alice@example.com', 'password789', 'profile3.jpg', '1122334455', 3),
('bob_jones', 'bob@example.com', 'password321', 'profile4.jpg', '5566778899', 2),
('charlie_brown', 'charlie@example.com', 'password654', 'profile5.jpg', '6677889900', 1),
('diana_clark', 'diana@example.com', 'password987', 'profile6.jpg', '3344556677', 3),
('eve_martin', 'eve@example.com', 'password654', 'profile7.jpg', '7788991122', 1),
('frank_taylor', 'frank@example.com', 'password321', 'profile8.jpg', '2233445566', 2),
('grace_davis', 'grace@example.com', 'password876', 'profile9.jpg', '4455667788', 3),
('hannah_lee', 'hannah@example.com', 'password543', 'profile10.jpg', '9988776655', 1);

-- Insert into Category table
INSERT INTO Category (title) VALUES
('Beachfront'),
('Mountain View'),
('City Center'),
('Countryside'),
('Luxury'),
('Budget');

-- Insert into Accommodation table
INSERT INTO Accommodation (user_id, title, description, category_id, address, basePrice, maxGuests, photos) VALUES
(1, 'Ocean Breeze Villa', 'A beautiful beachfront villa', 1, '123 Beach St', 200.00, 4, '{"photo1.jpg","photo2.jpg"}'),
(2, 'Mountain Retreat', 'Peaceful getaway in the mountains', 2, '456 Mountain Rd', 150.00, 6, '{"photo3.jpg","photo4.jpg"}'),
(3, 'City Loft', 'Modern apartment in the heart of the city', 3, '789 City Ave', 120.00, 2, '{"photo5.jpg","photo6.jpg"}'),
(4, 'Countryside Cottage', 'Charming cottage in the countryside', 4, '101 Rural Dr', 90.00, 5, '{"photo7.jpg","photo8.jpg"}'),
(5, 'Luxury Penthouse', 'Exclusive penthouse with stunning views', 5, '202 Skyline Blvd', 500.00, 4, '{"photo9.jpg","photo10.jpg"}'),
(6, 'Budget Stay', 'Affordable lodging in a central location', 6, '303 Budget St', 50.00, 2, '{"photo11.jpg","photo12.jpg"}'),
(7, 'Oceanview Suite', 'Spacious suite with ocean views', 1, '404 Ocean Rd', 220.00, 3, '{"photo13.jpg","photo14.jpg"}'),
(8, 'Mountain Lodge', 'Cozy lodge near hiking trails', 2, '505 Mountain Rd', 130.00, 4, '{"photo15.jpg","photo16.jpg"}'),
(9, 'Urban Retreat', 'Stylish urban apartment', 3, '606 Urban Blvd', 150.00, 3, '{"photo17.jpg","photo18.jpg"}'),
(10, 'Countryside Mansion', 'Luxury mansion surrounded by nature', 4, '707 Country Ln', 300.00, 10, '{"photo19.jpg","photo20.jpg"}');

-- Insert into Booking table
INSERT INTO Booking (accommodation_id, checkInDate, checkOutDate, numberOfGuests, totalPrice, user_id) VALUES
(1, '2025-02-01', '2025-02-07', 4, 800.00, 1),
(2, '2025-03-10', '2025-03-15', 6, 900.00, 2),
(3, '2025-04-05', '2025-04-10', 2, 240.00, 3),
(4, '2025-05-12', '2025-05-16', 5, 450.00, 4),
(5, '2025-06-20', '2025-06-25', 4, 1000.00, 5),
(6, '2025-07-01', '2025-07-05', 2, 200.00, 6),
(7, '2025-08-05', '2025-08-10', 3, 660.00, 7),
(8, '2025-09-10', '2025-09-15', 4, 520.00, 8),
(9, '2025-10-15', '2025-10-20', 3, 450.00, 9),
(10, '2025-11-01', '2025-11-05', 10, 3000.00, 10);

-- Insert into Review table
INSERT INTO Review (booking_id, rating, comment) VALUES
(1, 5, 'Amazing stay! Highly recommend.'),
(2, 4, 'Great place, but could improve the service.'),
(3, 5, 'Loved the apartment, very central.'),
(4, 3, 'Nice, but too far from main attractions.'),
(5, 5, 'Fantastic views and great luxury experience.'),
(6, 2, 'Very basic, not as advertised.'),
(7, 4, 'Nice suite with good amenities.'),
(8, 5, 'Wonderful place, very peaceful.'),
(9, 4, 'Great location and spacious apartment.'),
(10, 5, 'Incredible mansion, perfect for a large group.');

-- Insert into Payment table
INSERT INTO Payment (booking_id, amount, transactionId) VALUES
(1, 800.00, 'TX1234'),
(2, 900.00, 'TX5678'),
(3, 240.00, 'TX9101'),
(4, 450.00, 'TX1121'),
(5, 1000.00, 'TX3141'),
(6, 200.00, 'TX5161'),
(7, 660.00, 'TX7181'),
(8, 520.00, 'TX9202'),
(9, 450.00, 'TX1223'),
(10, 3000.00, 'TX3244');

-- Insert into Promotion table
INSERT INTO Promotion (accommodation_id, discountPercentage, startDate, endDate) VALUES
(1, 20.0, '2025-02-01', '2025-02-10'),
(2, 15.0, '2025-03-01', '2025-03-10'),
(3, 10.0, '2025-04-01', '2025-04-10'),
(4, 5.0, '2025-05-01', '2025-05-15'),
(5, 25.0, '2025-06-01', '2025-06-15'),
(6, 30.0, '2025-07-01', '2025-07-10'),
(7, 18.0, '2025-08-01', '2025-08-15'),
(8, 12.0, '2025-09-01', '2025-09-10'),
(9, 20.0, '2025-10-01', '2025-10-10'),
(10, 15.0, '2025-11-01', '2025-11-15');
>>>>>>> khaoula
