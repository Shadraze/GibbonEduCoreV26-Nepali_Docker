#!/bin/bash

INSTALL_DIR="_Volumes/gibbonEd/"

VERSION="26.0.00"
GIBBON_URL="https://github.com/GibbonEdu/core/releases/download/v${VERSION}/GibbonEduCore-InstallBundle.tar.gz"

sudo mkdir ${INSTALL_DIR}
sudo wget -c ${GIBBON_URL} -P /tmp/ 
sudo tar -xzf /tmp/GibbonEduCore-InstallBundle.tar.gz --directory ${INSTALL_DIR}
sudo chown -R www-data:www-data ${INSTALL_DIR} 
sudo chmod -R 755 ${INSTALL_DIR} 
sudo chmod -R 774 ${INSTALL_DIR}uploads