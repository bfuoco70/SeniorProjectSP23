#!/bin/bash

USER=sp_user
PW=P@SSW0rd123!
DB=spdb



#Create a mysql user
echo "Creating user..."
sudo mysql -e "CREATE USER ${USER}@localhost IDENTIFIED BY '${PW}';"
#Create a mysql database
echo "Creating database..."
sudo mysql -e "CREATE DATABASE ${DB};"
#grant all privileges for that user to the database
echo "Creating privileges for user..."
sudo mysql -e "GRANT ALL PRIVILEGES ON ${DB}.* to '${USER}'@'localhost';"
echo "Flushing privileges"
sudo mysql -e "FLUSH PRIVILEGES;"

echo "Beginning sql import"
echo "get ready to input password for sp_user in mysql"
mysql -u ${USER} -p ${DB} < SPDB-export.sql