CREATE TABLE role (
    idRole INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(25) CHECK (type IN ('client', 'admin', 'superAdmin'))
);
CREATE TABLE PanierPlante (
    plante_id INT,
    panier_id INT,
    PRIMARY KEY (plante_id, panier_id),
    FOREIGN KEY (plante_id) REFERENCES plante(idPlante),
    FOREIGN KEY (panier_id) REFERENCES panier(idPanier)
);

insert into plante (nom,prix,image,idCategorie) VALUES 
('Hosta', 180, '../images/Hosta.jpg',1),
('Lavande', 130, '../images/Lavande.jpg',1),
('Astilbe', 110, '../images/Astilbe.jpg',1),
('Sédum', 100, '../images/Sédum.jpg',1),
('Échinacée ', 140, '../images/Échinacée.jpg',1),
('Heuchère ', 150, '../images/Heuchère.jpg',1),
('Pivoine',90,'../images/Échinacée.jpg',1);



<img src="<?php echo $row[3] ?>" alt="">

<div class="title pt-4 pb-1"><?php echo $row[1] ?></div>

<div class="price"><?php echo $row[2] ?></div>