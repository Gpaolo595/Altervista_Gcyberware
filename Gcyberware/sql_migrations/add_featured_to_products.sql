-- Migrazione: Aggiungere campo featured alla tabella products
-- Data: 2026-05-28
-- Descrizione: Aggiunge la colonna booleana "featured" per gestire i prodotti in evidenza

ALTER TABLE products ADD COLUMN featured TINYINT(1) DEFAULT 0 AFTER image;

-- Verificare: 
-- SELECT id, name, featured FROM products LIMIT 5;
