create table users
(
    id int auto_increment,
    email varchar(255) null,
    login varchar(255) not null,
    password varchar(255) not null,
    fio varchar(255) null,
    constraint users_pk
        primary key (id)
);