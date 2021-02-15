#!/bin/bash
# Script pour extraire la base de donnee du docker

sudo docker exec -t -i laravel_posty bash -c "mysqldump -u root -p"posty" posty > dump.sql;";
sudo docker cp laravel_posty:/dump.sql ./
echo "DB Extraction Success - dump.sql"