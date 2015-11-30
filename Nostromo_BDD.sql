SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE client;
CREATE TABLE client (
	numClt int not null auto_increment,
	nomClt varchar(30) not null,
	prenomClt varchar(30) not null,
	adresseClt varchar(50) not null,
	cpClt varchar(5) not null,
	villeClt varchar(30) not null,
	mdpClt text not null,
	mailClt text not null,
	pointsClt int not null,
	primary key (numClt)
);
DROP TABLE commande;
CREATE TABLE commande (
	numCde int not null auto_increment primary key,
	numClt int not null references client(numClt),
    date datetime not null
);
DROP TABLE article;
CREATE TABLE article (
	numArt int not null,
	designation varchar(50) not null,
	pu int not null,
	qteStock int not null,
	primary key (numArt)
);
DROP TABLE commander;
CREATE TABLE commander (
	numArt int not null,
	numCde int not null,
	qte int not null,
	primary key (numArt, numCde),
	foreign key (numCde) references commande(numCde),
	foreign key (numArt) references article(numArt)
);
DROP TABLE vol;
CREATE TABLE vol (
	numVol int not null,
	dateVol date not null,
	heureVol time not null,
	nbPlace int not null,
	primary key (numVol)
);
DROP TABLE reservation;
CREATE TABLE reservation (
	numRes int not null auto_increment,
	numClt int not null,
	numVol int not null,
	dateRes datetime not null,
	nbPers int not null,
	primary key (numRes),
	foreign key (numClt) references client(numClt),
	foreign key (numVol) references vol(numVol)
);
DROP TABLE echeance;
CREATE TABLE echeance (
	numRes int not null primary key,
	montant int not null,
	dateEcheance datetime not null,
	foreign key (numRes) references reservation(numRes)
);

INSERT INTO vol VALUES (1,"2015-12-05", "15:00:00",40);
INSERT INTO vol VALUES (2,"2015-10-09", "12:15:00",80);
INSERT INTO vol VALUES (3,"2015-11-08", "18:10:00",90);
INSERT INTO vol VALUES (4,"2016-01-10", "14:20:00",60);

INSERT INTO article VALUES (1,"Gants astronaute",250,20);
INSERT INTO article VALUES (2,"Pantaton astronaute",400,20);
INSERT INTO article VALUES (3,"Casque astronaute",1200,5);

INSERT INTO `client` VALUES (1,"Nostromo","Contact","7 rue de Mars",53100,"MAYENNE","ffb4761cba839470133bee36aeb139f58d7dbaa9","contact@nostromo.com",150);

INSERT InTO reservation VALUES (1,1,3,'2014-12-10 15:14:30',50);

INSERT INTO commande VALUES (1,1,"2015-11-28 12:00:00");
INSERT INTO commander VALUES (1,1,2);
INSERT INTO commander VALUES (2,1,1);
INSERT INTO commande VALUES (2,1,"2015-10-20 10:00:00");
INSERT INTO commander VALUES (1,2,4);
SET FOREIGN_KEY_CHECKS = 1;