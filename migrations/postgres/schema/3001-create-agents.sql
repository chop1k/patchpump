
create table "app"."agents" (
    id integer generated always as identity,
    name varchar(16) not null,
    description text not null,
    pub_key varchar(256),
    constraint "app_agents_id_pkey"
        primary key (id),
)