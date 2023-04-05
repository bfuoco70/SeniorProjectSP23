#!/bin/bash

# sudo echo "$USER     ALL=(ALL)     NOPASSWD:ALL" > /etc/sudoers.d/USER 

echo "$USER  ALL=(ALL)     NOPASSWD:ALL" | sudo tee -a /etc/sudoers > /dev/null