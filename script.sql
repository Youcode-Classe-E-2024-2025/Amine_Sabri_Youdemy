CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name ENUM('admin', 'enseignant', 'etudiant') NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL DEFAULT 3, 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE RESTRICT
);



CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);



CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    video_url VARCHAR(255),
    image_url VARCHAR(255),
    document_url VARCHAR(255),
    category_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);



CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


CREATE TABLE course_tag (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);


CREATE TABLE user_cours (
    user_id INT NOT NULL,
    cours_id INT NOT NULL,
    PRIMARY KEY (user_id, cours_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (cours_id) REFERENCES courses(id) ON DELETE CASCADE
);



INSERT INTO roles (name) VALUES 
('admin'), 
('enseignant'), 
('etudiant');


INSERT INTO categories (name) VALUES 
('Informatique'), 
('Mathématiques'), 
('Sciences Sociales'), 
('Langues');




INSERT INTO tags (name) VALUES 
('Beginner'), 
('Advanced'), 
('Mathematics'), 
('Programming'), 
('Algorithms');



INSERT INTO courses (title, description, video_url, image_url, document_url, category_id) VALUES 
('Introduction à la programmation', 'Cours pour débutants en programmation avec Python', 'video_url_1', 'image_url_1', 'document_url_1', 1),
('Algorithmes et Structures de Données', 'Cours avancé sur les algorithmes et les structures de données', 'video_url_2', 'image_url_2', 'document_url_2', 1),
('Calcul différentiel et intégral', 'Introduction aux concepts du calcul', 'video_url_3', 'image_url_3', 'document_url_3', 2);




INSERT INTO course_tag (course_id, tag_id) VALUES 
(1, 1), 
(2, 2), 
(2, 4), 
(3, 3); 


INSERT INTO users (username, email, password, role_id) VALUES 
('admin1', 'admin1@example.com', 'hashed_password', 1),
('prof1', 'prof1@example.com', 'hashed_password', 2),
('etudiant1', 'etudiant1@example.com', 'hashed_password', 3);


INSERT INTO user_cours (user_id, cours_id) VALUES 
(3, 1), 
(3, 2),
(2, 3);
