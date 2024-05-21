CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE villes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);
CREATE TABLE logements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    category_id INT,
    ville_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (ville_id) REFERENCES villes(id),
);

INSERT INTO categories (name) VALUES
('Appartement'),
('Maison'),
('Studio'),
('Villa'),
;

INSERT INTO villes (name) VALUES
('Deauville'),
('Trouville'),
('Saint-arnoult');



