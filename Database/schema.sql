CREATE TABLE IF NOT EXISTS copies (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO copies (titre, contenu) 
VALUES ('Copie de test', 'Ceci est le contenu de ma première copie sauvegardée dans PostgreSQL.');
