#!/bin/bash
sudo service apache2 start
sudo service mariadb start
sudo systemctl enable mariadb.service
sudo systemctl enable apache2.service