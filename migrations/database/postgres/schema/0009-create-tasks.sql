create table "app"."tasks" (
    "id" integer generated always as identity,

    "definition_id" integer not null,

    "arguments" jsonb not null,

    constraint "app_task_id_pkey"
        primary key (id),

    constraint "app_tasks_task_definition_definition_id_fkey"
        foreign key (definition_id)
            references "app"."task_definitions" (id)
                on delete cascade,
);