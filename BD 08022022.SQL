DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS MLR1;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : CONSIGNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONSIGNE
 (
   IDCO CHAR(32) NOT NULL  ,
   LIBELLECO CHAR(32) NULL  
   , PRIMARY KEY (IDCO) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MEDECIN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MEDECIN
 (
   IDPERS CHAR(32) NOT NULL  ,
   IDSP CHAR(32) NOT NULL  ,
   NOMP CHAR(32) NULL  ,
   PRENOMP CHAR(32) NULL  ,
   LOGIN CHAR(32) NULL  ,
   MDP CHAR(32) NULL  
   , PRIMARY KEY (IDPERS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MEDECIN
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MEDECIN_SPECIALITE
     ON MEDECIN (IDSP ASC);

# -----------------------------------------------------------------------------
#       TABLE : RDV
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RDV
 (
   IDRDV CHAR(32) NOT NULL  ,
   IDCL CHAR(32) NOT NULL  ,
   IDMO CHAR(32) NOT NULL  ,
   IDPERS CHAR(32) NOT NULL  ,
   DATERDV CHAR(32) NULL  ,
   ETATRDV CHAR(32) NULL  ,
   HEURERDV CHAR(32) NULL  
   , PRIMARY KEY (IDRDV) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RDV
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RDV_MEDECIN
     ON RDV (IDPERS ASC);

CREATE  INDEX I_FK_RDV_CLIENT
     ON RDV (IDCL ASC);

CREATE  INDEX I_FK_RDV_MOTIF
     ON RDV (IDMO ASC);

# -----------------------------------------------------------------------------
#       TABLE : PIECE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECE
 (
   IDPI CHAR(32) NOT NULL  ,
   LIBELLEPI CHAR(32) NULL  
   , PRIMARY KEY (IDPI) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MOTIF
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOTIF
 (
   IDMO CHAR(32) NOT NULL  ,
   LIBELLEMO CHAR(32) NULL  ,
   PRIXMO CHAR(32) NULL  
   , PRIMARY KEY (IDMO) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TACHEADMIN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TACHEADMIN
 (
   IDTA CHAR(32) NOT NULL  ,
   IDPERS CHAR(32) NOT NULL  ,
   LIBELLETA CHAR(32) NULL  ,
   DATETA CHAR(32) NULL  
   , PRIMARY KEY (IDTA) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TACHEADMIN
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TACHEADMIN_MEDECIN
     ON TACHEADMIN (IDPERS ASC);

# -----------------------------------------------------------------------------
#       TABLE : SPECIALITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPECIALITE
 (
   IDSP CHAR(32) NOT NULL  ,
   LIBELLESP CHAR(32) NULL  
   , PRIMARY KEY (IDSP) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCL CHAR(32) NOT NULL  ,
   PRENOMCL CHAR(32) NULL  ,
   NOMCL CHAR(32) NULL  ,
   NUMTELCL CHAR(32) NULL  ,
   ADRESSECL CHAR(32) NULL  ,
   DEPARTNAISSCL CHAR(32) NULL  ,
   PAYNAISSCL CHAR(32) NULL  ,
   NSS CHAR(32) NULL  ,
   SOLDE CHAR(32) NULL  
   , PRIMARY KEY (IDCL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PERSONNEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PERSONNEL
 (
   IDPERS CHAR(32) NOT NULL  ,
   IDCAT CHAR(32) NOT NULL  ,
   NOMP CHAR(32) NULL  ,
   PRENOMP CHAR(32) NULL  ,
   LOGIN CHAR(32) NULL  ,
   MDP CHAR(32) NULL  
   , PRIMARY KEY (IDPERS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PERSONNEL
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PERSONNEL_CATEGORIE
     ON PERSONNEL (IDCAT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   IDCAT CHAR(32) NOT NULL  ,
   LIBELLECAT CHAR(32) NULL  
   , PRIMARY KEY (IDCAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMPREND
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPREND
 (
   IDMO CHAR(32) NOT NULL  ,
   IDCO CHAR(32) NOT NULL  
   , PRIMARY KEY (IDMO,IDCO) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPREND
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPREND_MOTIF
     ON COMPREND (IDMO ASC);

CREATE  INDEX I_FK_COMPREND_CONSIGNE
     ON COMPREND (IDCO ASC);

# -----------------------------------------------------------------------------
#       TABLE : DEMANDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEMANDE
 (
   IDMO CHAR(32) NOT NULL  ,
   IDPI CHAR(32) NOT NULL  
   , PRIMARY KEY (IDMO,IDPI) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DEMANDE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DEMANDE_MOTIF
     ON DEMANDE (IDMO ASC);

CREATE  INDEX I_FK_DEMANDE_PIECE
     ON DEMANDE (IDPI ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE MEDECIN 
  ADD FOREIGN KEY FK_MEDECIN_SPECIALITE (IDSP)
      REFERENCES SPECIALITE (IDSP) ;


ALTER TABLE MEDECIN 
  ADD FOREIGN KEY FK_MEDECIN_PERSONNEL (IDPERS)
      REFERENCES PERSONNEL (IDPERS) ;


ALTER TABLE RDV 
  ADD FOREIGN KEY FK_RDV_MEDECIN (IDPERS)
      REFERENCES MEDECIN (IDPERS) ;


ALTER TABLE RDV 
  ADD FOREIGN KEY FK_RDV_CLIENT (IDCL)
      REFERENCES CLIENT (IDCL) ;


ALTER TABLE RDV 
  ADD FOREIGN KEY FK_RDV_MOTIF (IDMO)
      REFERENCES MOTIF (IDMO) ;


ALTER TABLE TACHEADMIN 
  ADD FOREIGN KEY FK_TACHEADMIN_MEDECIN (IDPERS)
      REFERENCES MEDECIN (IDPERS) ;


ALTER TABLE PERSONNEL 
  ADD FOREIGN KEY FK_PERSONNEL_CATEGORIE (IDCAT)
      REFERENCES CATEGORIE (IDCAT) ;


ALTER TABLE COMPREND 
  ADD FOREIGN KEY FK_COMPREND_MOTIF (IDMO)
      REFERENCES MOTIF (IDMO) ;


ALTER TABLE COMPREND 
  ADD FOREIGN KEY FK_COMPREND_CONSIGNE (IDCO)
      REFERENCES CONSIGNE (IDCO) ;


ALTER TABLE DEMANDE 
  ADD FOREIGN KEY FK_DEMANDE_MOTIF (IDMO)
      REFERENCES MOTIF (IDMO) ;


ALTER TABLE DEMANDE 
  ADD FOREIGN KEY FK_DEMANDE_PIECE (IDPI)
      REFERENCES PIECE (IDPI) ;

