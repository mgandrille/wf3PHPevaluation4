-- # creation bdd `vtc`

CREATE DATABASE `vtc`;
USE `vtc`;

-- # creation table `conducteur`

CREATE TABLE `vtc`.`conducteur` (
    `id_conducteur` INT NOT NULL AUTO_INCREMENT,
    `prenom` VARCHAR(100) NULL,
    `nom` VARCHAR(100) NULL,
    PRIMARY KEY (`id_conducteur`));

-- # creation table `association_vehicule_conducteur`

CREATE TABLE `vtc`.`association_vehicule_conducteur` (
    `id_association` INT NOT NULL AUTO_INCREMENT,
    `id_vehicule` INT NULL,
    `id_conducteur` INT NULL,
    PRIMARY KEY (`id_association`),
    INDEX `id_conducteur _idx` (`id_conducteur` ASC),
    INDEX `id_vehicule _idx` (`id_vehicule` ASC),
    CONSTRAINT `id_vehicule `
        FOREIGN KEY (`id_vehicule`)
        REFERENCES `vtc`.`vehicule` (`id_vehicule`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT `id_conducteur `
        FOREIGN KEY (`id_conducteur`)
        REFERENCES `vtc`.`conducteur` (`id_conducteur`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION);

-- # creation table `vehicule`

CREATE TABLE `vtc`.`vehicule` (
    `id_vehicule` INT NOT NULL AUTO_INCREMENT,
    `marque` VARCHAR(100) NULL,
    `modele` VARCHAR(100) NULL,
    `couleur` VARCHAR(100) NULL,
    `immatriculation` VARCHAR(20) NULL,
    PRIMARY KEY (`id_vehicule`));

-- # pré-remplissage des tables

INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Julien', 'Avigny');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Morgane', 'Alamia');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Philippe', 'Pandre');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Amelie', 'Blondelle');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Alex', 'Richy');

INSERT INTO `vtc`.`vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES ('501', 'Peugeot', '807', 'noir', 'AB-355-CA');
INSERT INTO `vtc`.`vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES ('502', 'Citroen', 'C8', 'bleu', 'CE-122-AE');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Mercedes', 'Cls', 'vert', 'FG-953-HI');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Touran', 'noir', 'SO-322-NV');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Skoda', 'Octavia', 'gris', 'PB-631-TK');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Passat', 'gris', 'XN-973-MM');


INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '1');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('502', '2');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('503', '3');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('504', '4');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '3');

