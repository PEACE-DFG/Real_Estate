-- Drop the table if it exists (for demonstration purposes)
DROP TABLE IF EXISTS admin_users;

-- Create the admin_users table
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dateregistered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert a sample record (optional for testing)
INSERT INTO admin_users (username, email, password) VALUES ('admin', 'admin@example.com', 'hashedpassword');

<!-- Alteration of the table -->
ALTER TABLE admin_users ADD code INT(4) NOT NULL;
