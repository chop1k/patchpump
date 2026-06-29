
create table "app"."user_sessions" (
    id integer generated always as identity,

    user_id integer not null,

    addresses json not null,

    constraint "app_user_sessions_id_pkey"
        primary key (id),
    constraint "app_user_sessions_user_id_fkey"
        foreign key (user_id)
            references "app"."users" (id)
                on delete cascade,
);