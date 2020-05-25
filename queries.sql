USE vtc;

SELECT count(id_conducteur)
FROM conducteur;

SELECT count(id_vehicule)
FROM vehicule;

SELECT count(id_association)
FROM association_vehicule_conducteur;

SELECT * 
FROM vehicule
LEFT JOIN association_vehicule_conducteur 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
LEFT JOIN conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
WHERE association_vehicule_conducteur.id_association IS NULL;

SELECT * 
FROM conducteur
LEFT JOIN association_vehicule_conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
LEFT JOIN vehicule 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
WHERE association_vehicule_conducteur.id_association IS NULL;

SELECT * 
FROM association_vehicule_conducteur
LEFT JOIN conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur 
LEFT JOIN vehicule 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
WHERE conducteur.nom = 'Pandre';

SELECT * 
FROM conducteur
LEFT JOIN association_vehicule_conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
LEFT JOIN vehicule 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule;

SELECT * 
FROM vehicule
LEFT JOIN association_vehicule_conducteur 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
LEFT JOIN conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur;

SELECT * 
FROM association_vehicule_conducteur
FULL JOIN conducteur 
	ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur 
FULL JOIN vehicule 
	ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule;