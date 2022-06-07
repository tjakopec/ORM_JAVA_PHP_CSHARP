# Zahvala Vedran Kasapović https://github.com/VedranKasapovic
create table mjesanje(
    id int not null primary key auto_increment,
    vrsta varchar(50) not null,
    belot int not null,
    datumunosa datetime,
    stiglja int not null,
    bodovadrugiunos int,
    bodovaprviunos int,
    zvanjeprviunos int,
    bodovatreciunos int,
    zvanjetreciunos int,
    partija int not null
);

create table partija_igrac(
    partija int not null,
    igrac int not null
);

create table partija(
    id int not null primary key auto_increment,
    vrsta varchar(50) not null,
    dokolikoseigra int,
    lokacija int,
    unosi int
);

create table igrac(
    id int not null primary key auto_increment,
    ime varchar(20),
    prezime varchar(20),
    spol int not null,
    urlslika varchar(100)
);

create table lokacija(
    id int not null primary key auto_increment,
    latitude double not null,
    longitude double not null,
    naziv varchar(50)
);

# ključevi
alter table mjesanje add foreign key (partija) references partija(id);
alter table partija_igrac add foreign key (partija) references partija(id);
alter table partija_igrac add foreign key (igrac) references igrac(id);
alter table partija add foreign key (lokacija) references lokacija(id);
alter table partija add foreign key (unosi) references igrac(id);
