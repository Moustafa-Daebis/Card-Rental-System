use fproject;

create table adMin( E_mail varchar(255), name varchar(255) not null, password varchar(225) not null, country varchar(225) not null, city varchar(225) not null, phone varchar(225) not null, primary key (E_mail), unique (phone) );

create table customer( card_number int NOT Null, E_mail varchar(255), name varchar(255) not null, password varchar(225) not null, country varchar(225) not null, city varchar(225) not null, phone varchar(225) not null, address varchar(225) not null ,gender enum ('male','female'), primary key (E_mail), unique(phone) );

create table office( office_id int, country varchar(225) not null, city varchar(225) not null, primary key (office_id) );

create table car( plate_id varchar(255), brand varchar(255) not null, model varchar(255) not null, year year not null, price_per_day double not null, color varchar(255) not null, office_id int not null, carst varchar(255) not null, primary key (plate_id) );

create table car_status( plate_id varchar(255), carst enum('available','rented','out of services') default available , time date default current_timestamp() , PRIMARY key (plate_id,time) );

create table reservation( res_id int AUTO_INCREMENT , res_date date, E_mail varchar(255) not null, office_id int not null, plate_id varchar(225) not null, `from` date not null, `to` date not null, payment double not null, paid boolean not null, paid_date datetime not null, primary key (res_id,E_mail,plate_id,`from`,`to`) );


ALTER TABLE reservation ADD FOREIGN KEY (E_mail) REFERENCES customer(E_mail);

ALTER TABLE reservation ADD FOREIGN KEY (plate_id) REFERENCES car(plate_id);

ALTER TABLE reservation ADD FOREIGN KEY (office_id) REFERENCES office(office_id);

ALTER TABLE car_status ADD FOREIGN KEY (plate_id) REFERENCES car(plate_id);

ALTER TABLE car ADD FOREIGN KEY (office_id) REFERENCES office(office_id);
