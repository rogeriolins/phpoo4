create table estado (
    id integer primary key not null,
    sigla char(2),
    nome text
);

create table cidade(
	id integer PRIMARY key not null,
    nome text,
    id_estado integer REFERENCES estado(id)
);

create table pessoa(
    id integer PRIMARY key not null,
    nome text,
    endereco text,
    bairro text,
    telefone text,
    email text,
    id_cidade integer REFERENCES cidade(id)
);
