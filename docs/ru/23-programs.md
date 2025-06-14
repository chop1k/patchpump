#### Программы
Чтобы понять процесс автоматического исправления уязвимостей в программах, необходимо поразмыслить над составом этих программ, понять какие части могут изменяться и к каким возможным последствиям это приведет.
Программное обеспечение состоит из следующих элементов:
- исполняемая часть;
- зависимости;
- конфигурационная часть;
- сохраненные данные;
- статические активы.

Программа может содержать все свои части в пределах своей директории, а может содержать разные элементы в разных директориях.

##### Исполняемая часть
Под исполняемой частью подразумевается то, в каком виде поставляются исполняемые файлы программы.
Программа может быть:
1. компилируемой;
2. интерпретируемой;
3. гибридной.

Так же программы могут иметь систему плагинов, или иную систему, предполагающую динамическое включение внешнего кода в программу. В таком случае внешний подключаемый код считается внешней зависимостью и обрабатывается соответствующе.

###### Компилируемые программы
В случае когда программа компилируемая, она поставляется в виде двоичного файла, который вызывается напрямую и может иметь зависимость от динамических библиотек.

Изменения в компилируемую программу выполняются через простую замену старого исполняемого файла на новый. Такая же ситуация и с динамически включаемым кодом.

###### Интерпретируемые программы
В случае когда программа интерпретируемая, она поставляется в виде исходных кодов и имеет явную зависимость от интерпретатора.

Исходные коды могут храниться в следующих видах:
- каталог, содержащий исходные файлы программы;
- один сплошной файл с кодом, возможно предварительно обфусцированным или собранным;
- множество каталогов в разных частях системы, из которых код динамически подгружается интерпретатором.

Изменения в интерпретируемую программу делаются по-разному в зависимости от того как она хранится.

Для программ, хранящихся в виде каталога, изменения могут выполняться путем полной замены каталога со старым кодом на каталог с новым. Так же, в случае небольших исправлений, возможны замены одиночных файлов. Но для этого необходимо знание внутренней структуры каталога с кодом. 

Для программ, хранящихся в виде одного файла, изменение осуществляется с помощью обычной замены файла.

Для программ с множеством каталогов и подгружаемых файлов в разных частях системы, исправления возможны только в случае когда имеется список всех файлов, из которых этот код подгружается. Но даже так, если файлы этой программы смешаны с файлами другой программы, но замена директорий становится невозможна ведь будут повреждены файлы другой программы.

###### Гибридные программы
Для гибридных программ характерно наличие одновременно выполняемого низкоуровневого кода (часто в обфусцированном виде) и наличие виртуальной машины-интерпретатора, которая эту программу выполняет.

Изменения в такие программы поставляются идентично интерпретируемым программам.

##### Зависимости
Программа может иметь зависимости, которые необходимы для её выполнения и корректной работы.

Зависимости могут представлять собой:
- отдельные программы;
- текстовые файлы;
- объектные файлы.

Зависимости могут поставляться вместе с программой либо отдельно от неё.

Зависимости могут быть:
- обязательными для работы программы в целом;
- обязательны для работы конкретных функций программы
- необязательными.

Исправления зависимостей осуществляется полной заменой файлов. Для избежания нарушения работы программ, которые в зависимости, необходимо сохранение совместимости интерфейсов зависимости.

##### Конфигурация
Для управления поведением программы разработчики реализуют конфигурацию.

Конфигурация концептуально состоит из:
- шаблона конфигурации, которая реализуется в программе разработчиком;
- значения конфигурации.

Разработчик программы пишет шаблон, по которому программа считывает информацию из конкретного источника.

Источниками параметров конфигурации могут быть:
- конфигурационные файлы;
- аргументы командной строки;
- переменные окружения.

Разные версии программ могут иметь разные шаблоны конфигурации, либо разную интерпретацию значений этой конфигурации. В таком случае для каждой версии программы должна быть собственная версия конфигурации.

В случае когда разработчики поддерживают обратную совместимость, становится возможна динамическая замена программы без изменения её поведения за счет одинаковой интерпретации конфигурации независимо от версии программы.

##### Статические активы
Некоторые программы в процессе своей работы используют специальные файлы, называемые статическими активами. Они сами по себе никогда не меняются, а программа выполняет только чтение из этих файлов и не редактирует их. Как пример подобных активов можно привести различные картинки, иконки, видео, некоторые конфигурационные файлы, не предназначенные для редактирования пользователем.

Особенностью статических активов является возможность их замены без нарушения работы программы.

##### Данные
Программа может иметь данные, с которыми она работает. Данные обычно хранятся в базе данных, которая хранит:
- схему данных;
- сами данные.

Схема данных может быть разной в зависимости от версии приложения. Разные версии программы имеют разную схему данных, из этого следует проблема синхронизации схемы данных. Усложняет ситуацию то, что разработчики реализуют алгоритмы проверки соответствия схемы данных конкретной версии программы к той версии, которая сохранена в базе данных. За счет этого программа либо отказывается запускаться пока схема не будет соответствовать, либо, что еще хуже, сама выполнит миграцию схемы данных, что приведет к потере или повреждению данных.

На данный момент не имеется способа избежать потери данных и ожидаемой работы программы в таких случаях.

В таком случае единственное, что мы можем сделать, это маркировать каждую версию и устанавливать только те исправления, которые не затрагивают схему данных либо сами данные.

#### Способы поставки программ
На данный момент имеется 5 форм в которых может поставляться программа:
- исходные коды;
- исполняемые файлы;
- пакеты;
- контейнеры;
- образы виртуальных машин.

Каждая единица может быть предварительно завернута в архив и отправлена в таком виде с целью экономии трафика и места на диске.

##### Исходные коды
Программа поставляется в виде архива с исходными кодами. Архив может содержать:
- сами исходные коды;
- скрипты или исполняемые файлы, необходимые для сборки\управления программой;
- документацию и примеры конфигурации;
- статические активы;
- любые другие данные (файлы системы контроля версий, файлы конфигурации для инструментов используемых в процессе разработки, другие файлы).

Предполагается что пользователь сам выполнит сборку и установку программы в соответствии с документацией и своими собственными желаниями.

##### Исполняемые файлы
Программа поставляется в виде одного предварительно скомпилированного выполняемого файла.

##### Пакеты
Программа поставляется в виде архива, содержащего специальную структуру каталогов и файлов, необходимую для автоматической установки программы.

Ключевой момент заключается в наличии специальной файловой структуры и скриптов автоматической установки и удаления программы.

##### Контейнеры
Программа поставляется в виде предварительно заготовленного контейнера, содержащего в себе всё необходимое для работы программы. Ключевое отличие от пакетов в том что программа не устанавливается в систему пользователя, а работает в пределах контейнера. По сути программа поставляется в уже установленном виде, единственное, что необходимо - настроить её и запустить.
 
##### Образы виртуальных машин
