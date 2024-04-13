# WIP, not suited for production yet!!! only for testing!!!

# Be in this directory before running any of these commands!!!

# To setup and deploy, be in this directory and run:
./Deploy.sh

NOTE: It can take a while for database to startup, <br>
during which gibbon might say that it can't connect to the database.

To stop, use: ./Stop.sh

To clear database, first stop and then: 'rm -rf ./_Volumes'. Deploy again afterwards to start new installation.

# During Gibbon Installation, for step 2, use:
Database Address -> db <br>
Database Name -> gibbondb <br>
User -> gibbon <br>
Password -> gibbonPass <br>

# Refs:
Original docker project can be obtained through kerrongordon's github, using github tag "kerrongordon/gibbon-docker"
