
create table "app"."files" (
    id integer generated always as identity,

    path text not null,
    size bigint not null,
    content_type text not null,
    options_type "app"."file_types",

    constraint "app_files_id_pkey"
        primary key (id),
)