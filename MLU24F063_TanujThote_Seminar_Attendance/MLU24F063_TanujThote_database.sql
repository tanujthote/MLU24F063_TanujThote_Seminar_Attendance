CREATE TABLE IF NOT EXISTS seminar_attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(100) NOT NULL,
    roll_number VARCHAR(50) NOT NULL,
    seminar_title VARCHAR(150) NOT NULL,
    attendance_state ENUM('Present', 'Absent', 'Late') NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO seminar_attendance (participant_name, roll_number, seminar_title, attendance_state) VALUES
('Tanuj Thote', 'MLU24F063', 'AI & Machine Learning Trends', 'Present'),
('Jane Smith', 'MLU24F002', 'Cloud Computing Essentials', 'Absent'),
('Robert O\'Reilly', 'MLU24F003', 'Database Management Systems', 'Present');