create table "app"."tools" (
    "id" integer generated always as identity,

    "name" varchar(64) not null,
    "description" text,

    constraint "app_tools_id_pkey"
        primary key (id),
);