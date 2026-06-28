
create table "app"."users" (
    id integer generated always as identity,
    name varchar(16) not null,
    email varchar(64) not null,
    constraint "app_users_id_pkey"
        primary key (id),
--     roles
--     contacts
--     bans
);