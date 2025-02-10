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
INSERT INTO Booking (accommodation_id, checkInDate, checkOutDate, numberOfGuests, totalPrice, status)
VALUES
(1, '2025-02-01', '2025-02-07', 2, 1000.0, 'active',3),
(2, '2025-02-05', '2025-02-10', 1, 50.0, 'active',6),
(3, '2025-02-10', '2025-02-15', 3, 450.0, 'active',9),


-- Insert sample Reviews
INSERT INTO Review (booking_id, rating, comment, status)
VALUES
(1, 5, 'Excellent stay!', 'approved'),
(2, 3, 'Good, but could be better.', 'approved'),
(3, 4, 'Nice place, but a bit noisy.', 'approved'),
(4, 5, 'Perfect for our family!', 'approved'),
(5, 2, 'Too small for the price.', 'pending'),
(6, 4, 'Great location, enjoyed the stay.', 'approved'),
(7, 5, 'Amazing experience, would recommend!', 'approved'),
(8, 3, 'It was fine, but expected more amenities.', 'pending'),
(9, 5, 'Wonderful experience!', 'approved'),
(10, 4, 'Great value for the price.', 'approved');

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
