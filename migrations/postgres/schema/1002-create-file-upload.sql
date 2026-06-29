
create table "app"."file_upload" (
    id generated always as identity,

    file_id integer not null,
    token varchar(32) not null,

    constraint "app_file_uploads_id_pkey"
        primary key (id),
    constraint "app_file_uploads_file_file_id_fkey"
        foreign key (file_id)
            references "app"."files" (id)
                on delete cascade,
)