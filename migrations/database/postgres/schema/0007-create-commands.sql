create table "app"."commands" (
    "id" integer generated always as identity,

    "tool_id" integer not null,

    "name" varchar(64) not null,
    "description" text,

    "schema" jsonb not null,

    constraint "app_commands_id_pkey"
        primary key (id),

    constraint "app_commands_tools_tool_id_fkey"
        foreign key (tool_id)
            references "app"."tools" (id)
                on delete cascade,
);