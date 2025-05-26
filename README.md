# Scoring App (LAMP Stack)

A simple web-based scoring system with admin, judge, and public scoreboard interfaces.

## Features

- Admin panel to add **Judges** and **Participants**
- Judges can view participants and assign scores (1–100)
- Public **Scoreboard** displays all participants sorted by total score
- Auto-updating UI (intended for live competitions)
- Built with PHP, MySQL, HTML, CSS


## Prerequisites

- Apache (or XAMPP/LAMP/WAMP)
- PHP 7+
- MySQL
- Git



## Setup Instructions

1. Clone this repo
2. Import `database.sql` into MySQL
3. Serve app via Apache (`/var/www/html`)
4. Visit `/admin`, `/judge`, `/scoreboard`

## Database Schema

CREATE DATABASE lamp_score;

USE lamp_score;

-- Judges Table
CREATE TABLE judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Participants Table
CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Scores Table
CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    participant_id INT NOT NULL,
    judge_id VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    FOREIGN KEY (participant_id) REFERENCES participants(id),
    FOREIGN KEY (judge_id) REFERENCES judges(judge_id)
);


## Assumptions

Judges and participants are managed manually for simplicity.

No user authentication (but structure allows easy extension).

All judges can score any participant independently.

## Author

Benard Bett
GitHub:BenardBett
