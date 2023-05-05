#!/bin/bash
scp hayden:/home/ickyfreaky/seniorProject/Loot/LOOT-systeminfo.txt /home/ben/seniorProject/Loot
iconv -f UTF-16LE -t UTF-8 /home/ben/seniorProject/Loot/LOOT-systeminfo.txt -o /home/ben/seniorProject/Loot/LOOT-systeminfo.txt

