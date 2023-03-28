create database testBuzzvel;

create table user(
    id int not null auto_increment primary key,
    name varchar(300) unique,
    linkedinURL varchar(80),
    githubURL varchar(80)
)