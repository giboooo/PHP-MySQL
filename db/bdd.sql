CREATE DATABASE IF NOT EXISTS `Admin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE 'Admin';

-- Structure de la table `t_authorization`
 
CREATE TABLE IF NOT EXISTS `t_authorization`(
    `aut_id` INT(11) NOT NULL,
    `aut_label` VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Structure de la table `t_role`

CREATE TABLE IF NOT EXISTS  `t_role`(
    `rol_id` INT(11) NOT NULL,
    `rol_power` INT(3) NOT NULL,
    `rol_label` VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `r_rol_aut`

CREATE TABLE IF NOT EXISTS `r_rol_aut`(
    `rol_id_fk` INT(11) NOT NULL,
    `aut_id_fk` INT(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `t_user`

CREATE TABLE IF NOT EXISTS `t_user`(
    `use_id` INT(11) NOT NULL,
    `use_lastname` VARCHAR(50) NOT NULL,
    `use_firstname` VARCHAR(50) NOT NULL,
    `use_password` VARCHAR(255) NOT NULL,
    `use_username` VARCHAR(50) NOT NULL,
    `use_email` VARCHAR(255) NOT NULL,
    `use_country` VARCHAR(100) NOT NULL,
    `use_role_fk`  INT(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `t_role`
    ADD PRIMARY KEY (`rol_id`);

ALTER TABLE `t_role`
   MODIFY `rol_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `t_user`
    ADD PRIMARY KEY (`use_id`),
    ADD KEY `use_role_fk`(`use_role_fk`),
    ADD CONSTRAINT `constraint_user_role` FOREIGN KEY (`use_role_fk`) REFERENCES `t_role` (`rol_id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `t_user`
   MODIFY `use_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `t_authorization`
    ADD PRIMARY KEY (`aut_id`);

ALTER TABLE `t_authorization`
   MODIFY `aut_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `r_rol_aut`
    ADD KEY `rol_id_fk` (`rol_id_fk`),
    ADD KEY `aut_id_fk` (`aut_id_fk`),
    ADD CONSTRAINT `constraint_role_authorization` FOREIGN KEY (`rol_id_fk`) REFERENCES `t_role` (`rol_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
    ADD CONSTRAINT `constraint_authorization_role` FOREIGN KEY (`aut_id_fk`) REFERENCES `t_authorization` (`aut_id`) ON UPDATE CASCADE ON DELETE RESTRICT;




INSERT INTO `t_role` (`rol_id`, `rol_power`, `rol_label`) VALUES     
(1, 100, "superadmin"),     
(2, 75, "admin"),     
(3, 10, "user"),     
(4, 1, "guest");

INSERT INTO `t_user`(`use_id`,`use_lastname`, `use_firstname`, `use_password`,  `use_username`, `use_email`, `use_country`, `use_role_fk`) VALUES
(1, '3W', 'Objectif', 'user1@pwd', 'User1', 'admin@mail.fr', 'France', 1),
(2, '3W', 'Objectif', 'user2@pwd', 'User2', 'admin@mail.misere', 'France', 1);