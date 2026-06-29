
create table "app"."contacts" (
    id int primary key generated always as identity,
    user_id int not null,
    type varchar(64) not null,
    value varchar(256) not null,
    constraint "app_contacts_id_pkey"
        primary key (id),
    constraint "app_contacts_user_id_fkey"
        foreign key (user_id)
            references "app"."users" (id)
                on delete cascade
);