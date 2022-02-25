CREATE TABLE users(
  userId int PRIMARY KEY AUTO_INCREMENT,
  firstName varchar(20) not null,
  lastName varchar(20) not null,
  userName varchar(20) not null unique,
  email varchar(30) not null unique,
  motPasse varchar(8) not null,
  img varchar(255)
);
CREATE TABLE posts(
  postId int PRIMARY KEY AUTO_INCREMENT,
  title varchar(30) not null,
  img varchar(255),
  body text not null,
  hach varchar(255) not null,
  genre varchar(255),
  published_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  userId int NOT NULL,
  FOREIGN KEY (userId) REFERENCES users(userId)
  
);
CREATE TABLE comments(
    commentId int PRIMARY KEY AUTO_INCREMENT,
    body varchar(255) not null,
    published_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    postId int NOT NULL,
    userId int NOT NULL,
    FOREIGN KEY (postId) REFERENCES posts(postId),
    FOREIGN KEY (userId)  REFERENCES users(userId)
);




