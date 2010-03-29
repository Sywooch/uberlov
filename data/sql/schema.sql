CREATE TABLE fish (id BIGINT AUTO_INCREMENT, name VARCHAR(100) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE friend (id BIGINT UNIQUE, source_profile_id BIGINT NOT NULL, related_profile_id BIGINT NOT NULL, INDEX related_profile_id_idx (related_profile_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE location (id INT AUTO_INCREMENT, name VARCHAR(50) DEFAULT '' NOT NULL, description VARCHAR(255) DEFAULT '' NOT NULL, location_type_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), latitude FLOAT(18, 2), longitude FLOAT(18, 2), INDEX location_type_id_idx (location_type_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE location_type (id INT AUTO_INCREMENT, name VARCHAR(50) DEFAULT '' NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE profile (id BIGINT AUTO_INCREMENT, nick_name VARCHAR(50) DEFAULT '' NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, description VARCHAR(255) DEFAULT '' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE profit (id BIGINT AUTO_INCREMENT, location_id INT, profile_id BIGINT, time TIME NOT NULL, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX location_id_idx (location_id), INDEX profile_id_idx (profile_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE profit_fish (id BIGINT UNIQUE, fish_id BIGINT NOT NULL, profit_id BIGINT NOT NULL, qty FLOAT(18, 2) NOT NULL, INDEX fish_id_idx (fish_id), INDEX profit_id_idx (profit_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE profit_syle (id BIGINT UNIQUE, style_id BIGINT NOT NULL, profit_id BIGINT NOT NULL, INDEX style_id_idx (style_id), INDEX profit_id_idx (profit_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE style (id BIGINT AUTO_INCREMENT, name VARCHAR(100) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE friend ADD CONSTRAINT friend_related_profile_id_profile_id FOREIGN KEY (related_profile_id) REFERENCES profile(id);
ALTER TABLE location ADD CONSTRAINT location_location_type_id_location_type_id FOREIGN KEY (location_type_id) REFERENCES location_type(id);
ALTER TABLE profit ADD CONSTRAINT profit_profile_id_profile_id FOREIGN KEY (profile_id) REFERENCES profile(id);
ALTER TABLE profit ADD CONSTRAINT profit_location_id_location_id FOREIGN KEY (location_id) REFERENCES location(id);
ALTER TABLE profit_fish ADD CONSTRAINT profit_fish_profit_id_profit_id FOREIGN KEY (profit_id) REFERENCES profit(id);
ALTER TABLE profit_fish ADD CONSTRAINT profit_fish_fish_id_fish_id FOREIGN KEY (fish_id) REFERENCES fish(id);
ALTER TABLE profit_syle ADD CONSTRAINT profit_syle_style_id_style_id FOREIGN KEY (style_id) REFERENCES style(id);
ALTER TABLE profit_syle ADD CONSTRAINT profit_syle_profit_id_profit_id FOREIGN KEY (profit_id) REFERENCES profit(id);
