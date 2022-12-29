create schema fproject;

use fproject;

create table adMin(
E_mail varchar(255),
`name` varchar(255) not null,
`password` varchar(225) not null,
country varchar(225) not null,
city  varchar(225) not null,
phone  varchar(225) not null,
primary key (E_mail),
unique (phone)
);

create table customer(
card_number int NOT Null,
E_mail varchar(255),
`name` varchar(255) not null,
`password` varchar(225) not null,
country varchar(225) not null,
city  varchar(225) not null,
phone  varchar(225) not null,
address  varchar(225) not null,
primary key (E_mail),
unique(phone)
);


create table office(
office_id int,
country varchar(225) not null,
city  varchar(225) not null,
primary key (office_id)
);


create table car(
plat_id varchar(255),
brand varchar(255) not null,
model varchar(255) not null,
`year` year not null,
price_per_day double not null,
color varchar(255) not null,
office_id int not null,
car_st varchar(255) not null,
primary key (plat_id)
);


create table car_status(
plate_id varchar(255),
car_st enum('available','rented','out of services')
time date default current_timestamp()	;
 PRIMARY key (plate_id,time)
);

create table reservation(
res_id int AUTO_INCREMENT ,
res_date date,
E_mail varchar(255) not null,
office_id int not null,
plat_id varchar(225) not null,
`from` datetime not null,
`to` datetime not null,
payment  double not null,
paid  boolean not null,
paid_date datetime not null,
primary key (res_id,E_mail,plat_id,`from`,`to`)
);

create table res_count(
res_id int not null ,
E_mail varchar(255) not null,
primary key (res_id,E_mail)
);


ALTER TABLE reservation
ADD FOREIGN KEY (E_mail) REFERENCES customer(E_mail);

ALTER TABLE reservation
ADD FOREIGN KEY (plat_id) REFERENCES car(plat_id);

ALTER TABLE reservation
ADD FOREIGN KEY (office_id) REFERENCES office(office_id);

ALTER TABLE car_status
ADD FOREIGN KEY (plat_id) REFERENCES car(plat_id);

ALTER TABLE car
ADD FOREIGN KEY (office_id) REFERENCES office(office_id);

ALTER TABLE res_cont ADD FOREIGN KEY (E_mail) REFERENCES reservation(E_mail) ON UPDATE CASCADE on DELETE CASCADE;
ALTER TABLE res_cont ADD FOREIGN KEY (res_id) REFERENCES reservation(res_id) ON UPDATE CASCADE on DELETE CASCADE;






