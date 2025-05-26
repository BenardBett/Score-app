-- Drop tables if they exist (for development reset)
DROP TABLE IF EXISTS scores;
DROP TABLE IF EXISTS judges;
DROP TABLE IF EXISTS participants;

-- Participants table
CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Judges table
CREATE TABLE judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL
);

-- Scores table (relation between judges and participants)
CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT NOT NULL,
    participant_id INT NOT NULL,
    score INT NOT NULL,
    FOREIGN KEY (judge_id) REFERENCES judges(id),
    FOREIGN KEY (participant_id) REFERENCES participants(id)
);
