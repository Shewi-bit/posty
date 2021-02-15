#!/bin/bash
# Update de la db

sudo docker cp ./dump.sql laravel_posty:./
docker exec -t -i laravel_posty bash -c "mysqladmin -u root -pposty -f drop posty;";
docker exec -t -i laravel_posty bash -c "mysqladmin -u root -pposty create posty;";
echo "DB Creation Ok"
docker exec -t -i laravel_posty bash -c "mysql -u root -pposty posty < ./dump.sql;";
echo "DB Update Success"