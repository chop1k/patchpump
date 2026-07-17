create table "app"."task_definitions" (
    "id" integer generated always as identity,

    "name" varchar(64) not null,
    "description" text,

    constraint "app_task_definitions_id_pkey"
        primary key (id),
);

create table "app"."task_definitions_commands" (
    "id" integer generated always as identity,

    "definition_id" integer not null,
    "command_id" integer not null,

    "position" integer not null,

    constraint "app_task_definitions_commands_id_pkey"
        primary key (id),

    constraint "app_task_definitions_commands_definition_id_fkey"
        foreign key (definition_id)
            references "app"."task_definitions" (id)
                on delete cascade,
    constraint "app_task_definitions_commands_command_id_fkey"
        foreign key (definition_id)
            references "app"."commands" (id)
                on delete cascade,
);