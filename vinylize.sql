-- Create the database
CREATE SCHEMA vinylize;
-- Use the database
USE vinylize;
-- Create the Artists table
CREATE TABLE Artists (
     ArtistID INT AUTO_INCREMENT PRIMARY KEY,
     ArtistName VARCHAR(255) NOT NULL
);
-- Create the Albums table
CREATE TABLE Albums (
     AlbumID INT AUTO_INCREMENT PRIMARY KEY,
     AlbumName VARCHAR(255) NOT NULL,
     ArtistID INT NOT NULL,
     CoverImage VARCHAR(255) NOT NULL,
     -- URL or file path for the album cover image
     FOREIGN KEY (ArtistID) REFERENCES Artists(ArtistID) ON DELETE CASCADE
);