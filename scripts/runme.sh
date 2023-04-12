#!/bin/bash
./elevateUser.sh
./install.sh
./composerinstall.sh
./startservices.sh
./importDatabase.sh
#Make sure to run composer install from base directory after running this script