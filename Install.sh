#!/bin/bash

apt update
apt install -y docker-compose-v2 wget tar

INSTALL_DIR="_Volumes/gibbonEd/"

VERSION="26.0.00"
GIBBON_URL="https://github.com/GibbonEdu/core/releases/download/v${VERSION}/GibbonEduCore-InstallBundle.tar.gz"

mkdir _Volumes
mkdir ${INSTALL_DIR}
wget -c ${GIBBON_URL} -P /tmp/ 
tar -xzf /tmp/GibbonEduCore-InstallBundle.tar.gz --directory ${INSTALL_DIR}
chown -R www-data:www-data ${INSTALL_DIR} 
chmod -R 755 ${INSTALL_DIR} 
chmod -R 774 ${INSTALL_DIR}uploads

docker compose build
