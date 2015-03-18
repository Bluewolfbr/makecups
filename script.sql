/*
Created		01/03/2015
Modified		11/03/2015
Project		
Model			
Company		
Author		
Version		
Database		PostgreSQL 8.1 
*/


/* Create Tables */


Create table "campeonato"
(
	"id_campeonato" Numeric NOT NULL,
	"id_campeao" Numeric,
	"nome" Varchar(20) NOT NULL,
	"criado" Date NOT NULL,
	"finalizado" Date,
	"status" Char(1),
 primary key ("id_campeonato")
) Without Oids;


Create table "clube"
(
	"id_clube" Numeric NOT NULL,
	"id_liga" Numeric NOT NULL,
	"nome" Varchar(50) NOT NULL,
	"nome_completo" Varchar(200) NOT NULL,
	"abbr" Char(3) NOT NULL,
 primary key ("id_clube")
) Without Oids;


Create table "liga"
(
	"id_liga" Numeric NOT NULL,
	"nome" Varchar(30),
 primary key ("id_liga")
) Without Oids;


Create table "jogador"
(
	"id_campeonato" Numeric NOT NULL,
	"id_clube" Numeric NOT NULL,
	"nome" Varchar(50) NOT NULL,
 primary key ("id_campeonato","id_clube")
) Without Oids;


Create table "usuario"
(
	"id_usuario" Numeric NOT NULL,
	"nome" Varchar(100) NOT NULL,
	"senha" Varchar(8) NOT NULL,
 primary key ("id_usuario")
) Without Oids;


Create table "rodada"
(
	"id_rodada" Numeric NOT NULL,
	"id_campeonato" Numeric NOT NULL,
	"nome" Varchar(20) NOT NULL,
	"ordem" Numeric NOT NULL,
 primary key ("id_rodada")
) Without Oids;


Create table "partida"
(
	"id_partida" Numeric NOT NULL,
	"id_rodada" Numeric NOT NULL,
	"id_clubeMandante" Numeric NOT NULL,
	"id_clubeVisitante" Numeric NOT NULL,
	"id_clubeVencedor" Numeric,
 primary key ("id_partida")
) Without Oids;



/* Create Tab 'Others' for Selected Tables */


/* Create Alternate Keys */



/* Create Indexes */
Create unique index "index_campeonato_ordem" on "rodada" using btree ("id_campeonato","ordem");
Create unique index "unique_times_rodada" on "partida" using btree ("id_rodada","id_clubeMandante","id_clubeVisitante");



/* Create Foreign Keys */

Alter table "jogador" add  foreign key ("id_campeonato") references "campeonato" ("id_campeonato") on update restrict on delete restrict;

Alter table "rodada" add  foreign key ("id_campeonato") references "campeonato" ("id_campeonato") on update restrict on delete restrict;

Alter table "jogador" add  foreign key ("id_clube") references "clube" ("id_clube") on update restrict on delete restrict;

Alter table "clube" add  foreign key ("id_liga") references "liga" ("id_liga") on update restrict on delete restrict;

Alter table "campeonato" add  foreign key ("id_campeao") references "usuario" ("id_usuario") on update restrict on delete restrict;

Alter table "partida" add  foreign key ("id_rodada") references "rodada" ("id_rodada") on update restrict on delete restrict;





