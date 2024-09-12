-- Verifica se il database esiste e, se esiste, cancellalo
DROP DATABASE IF EXISTS sqlidb;

-- Crea un nuovo database
CREATE DATABASE sqlidb;

-- Usa il database appena creato
USE sqlidb;

-- Creazione della tabella users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL,
    password varchar(50) NOT NULL
);
-- Creazione della tabella search_data
CREATE TABLE IF NOT EXISTS search_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT
);

-- Inserimento di dati nella tabella users
INSERT INTO users (username, password) VALUES 
('alice', 'P@ssw0rd123'),
('bob', 'S3cur3P@ss!'),
('charlie', 'C0mpl3xP@ssw0rd'),
('dave', 'SimplePassw0rd!'),
('eve', 'Secur3!Pass2024');

-- Inserimento di dati di esempio in search_data
INSERT INTO search_data (title, description) VALUES
('Sicurezza Informatica', 'Una panoramica completa sulla sicurezza informatica e le sue minacce.'),
('Protezione dei Dati', 'Tecniche e pratiche per proteggere i dati sensibili da accessi non autorizzati.'),
('Gestione delle Vulnerabilità', 'Come identificare e gestire le vulnerabilità nei sistemi informatici.');

