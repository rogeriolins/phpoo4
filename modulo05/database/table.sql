create table produto (id integer primary key not null, descricao text, estoque float, preco_custo float, preco_venda float, codigo_barras text, data_cadastro date, origem char(1));

create table venda (id integer primary key not null, data_venda date);

create table item_venda (id integer primary key not null, id_produto integer references produto(id), id_venda integer references venda(id), quantidade float, preco float);