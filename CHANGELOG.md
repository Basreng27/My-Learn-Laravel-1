<!-- Create Database -->
CREATE DATABASE my_learn_laravel_1;

<!-- Create Extension UUID -->
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

<!-- Create Table Users -->
CREATE TABLE users (
    id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    user_id TEXT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
ALTER TABLE users ADD COLUMN created_at TIMESTAMP;
ALTER TABLE users ADD COLUMN updated_at TIMESTAMP;
ALTER TABLE users ADD COLUMN deleted_at TIMESTAMP;

<!-- Create Table Menu -->
CREATE TABLE menus (
    id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    parent_id UUID,
    label VARCHAR(255) NOT NULL,
    code VARCHAR(255),
    url VARCHAR(255) NOT NULL,
    icon VARCHAR(255) NOT NULL,
	created_at TIMESTAMP,
	updated_at TIMESTAMP,
	deleted_at TIMESTAMP
);
