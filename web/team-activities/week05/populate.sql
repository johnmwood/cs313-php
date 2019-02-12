CREATE TABLE scriptures (
  id SERIAL PRIMARY KEY,
  book TEXT NOT NULL, 
  chapter INT NOT NULL, 
  verse INT NOT NULL, 
  content TEXT NOT NULL
); 

INSERT INTO scriptures(book, chapter, verse, content) VALUES 
  ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'), 
  ('Job', 6, 6, 'Will tasteless things be eaten without salt, Or is there any taste in the slimy juice of marshmallow?'), 
  ('D&C', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
  ('D&C', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
  ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened,; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE topics (
  id SERIAL PRIMARY KEY, 
  name TEXT NOT NULL 
);

INSERT INTO topics(name) VALUES ('Faith'), ('Sacrifice'), ('Charity');

CREATE TABLE scriptureTopics (
  scriptureID INTEGER REFERENCES scriptures(id), 
  topicID INTEGER REFERENCES topics(id)
);