/*
Users: 
- id: int 
- name: text 
- credits: int 

Clients:
- id: int 
- name: text 
- email: text 
- user_id: int (user foreign key) 

EmailTemplates: 
- id: int 
- template: text 
- user_id: int (user foreign key)

EmailTransactions: 
- id: int 
- client_id: int (client foreign key) 
- template_id: int (email_templates foreign key) 
- date: datetime 
*/ 
CREATE TABLE users (
    id SERIAL PRIMARY KEY, 
    username VARCHAR (50) NOT NULL,
    password VARCHAR (50) NOT NULL, 
    credits INT NOT NULL
); 

CREATE TABLE clients (
    id SERIAL PRIMARY KEY, 
    name VARCHAR (50) NOT NULL, 
    email VARCHAR (50) NOT NULL, 
    user_id SERIAL REFERENCES users(id)
);

CREATE TABLE email_templates (
    id SERIAL PRIMARY KEY, 
    template VARCHAR(2048) NOT NULL, 
    user_id SERIAL REFERENCES users(id) 
);

CREATE TABLE transactions (
    id SERIAL PRIMARY KEY, 
    transaction_date TIMESTAMP NOT NULL, 
    client_id SERIAL REFERENCES clients(id), 
    template_id SERIAL REFERENCES email_templates(id) 
);

UPDATE clients SET user_id = 35 WHERE user_id = 2; 