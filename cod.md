#Comandos consola
ls -> ver carpestas
pwd -> ubicacion actual
cd .. -> devolverme 
cd shift * tabulador -> seleccinar carpetas y trasladarse
mkdir "nombre_carpeta" ->crear carpera


#Comandos git
Configuracion minima 
git config -- global user.name "nombre_usuario" -> se establece que la configuracion es global
git config -- global user.email "email" -> se establece que la configuracion es global

#Inicio
1. git init -> dentro de la carpeta del proyecto para inicializar 
2. git branch -m main -> trabajar con la rama principal
3. git status -> ver estado en rojo tiene cambios, en verde ya añadidos
4. git add nombreFichero.py -> si quiero añadir solo este fiche las modificaciones de este
5. git add . -> se añade todos los ficheros o las modificaciones 
6. git commit -m "comentario" -> Para cargar 
7. git log -> muestra el cmmit con la clave unica y a la rama que va mueustra fecha hora y usuario asi como el mensaje de commit
8. git checkout nombreFichero.py -> elimina los cambios que tuvo pero que no se le hicieron commit
9. git reset -> muestra los ficheros que se pueden cambiar con git checkou
10 .git log --graph --pretty=oneline -> muestra la informacion mas compacta de los commit
11. git log --graph --decorate –all --oneline-> muestra la informacion mas compacta de los commit
11. git config -- global alias.nombreAlias " git log --graph --decorate –all --oneline " -> con estos alias hacemos abreviasiones 
12. mkdir .gitignore -> en la carpeta raiz para crear el archivo
        editar el archivo
            **/"nombreFichero" -> ingnora este fichero
13. git diff -> muestra los cambios antes de guardar menos  (-) indica lo que habia mas (+) el cambio
14. git checkout NumeroCommit -> nos devuelve a ese commit y elimina todo 
15. git checkout HEAD -> 
16. git tree (git log --graph --decorate –all --onelin) -> muestra los commit y donde estamos
17. git reset --hard codigoCommit -> nos devulvbe al commi y elimina los cambio


