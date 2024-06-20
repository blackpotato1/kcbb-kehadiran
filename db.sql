CREATE DATABASE kehadiran_ahli;

CREATE TABLE kelas (
    id_kelas INT(2) AUTO_INCREMENT,
    ting VARCHAR(2),
    nama_kelas VARCHAR(60),

    PRIMARY KEY ( id_kelas )
);

CREATE TABLE ahli (
    nama VARCHAR(60),
    nokp VARCHAR(12),
    id_kelas INT(2),
    tahap VARCHAR(20),
    katalaluan VARCHAR(15),

    PRIMARY KEY (nokp),
    FOREIGN KEY (id_kelas)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE kehadiran (
    id_aktiviti INT(2),
    nokp VARCHAR(12),
    masa_hadir TIME,

    PRIMARY KEY (id_aktiviti, nokp),

    FOREIGN KEY (nokp)
    REFERENCES ahli (nokp)
    ON UPDATE CASCADE ON DELETE CASCADE
)